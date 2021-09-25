<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Account;
use App\Models\Transfer;
use App\Mail\TransferMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        request()->validate([
            'ref_no' => 'required|string',
            'amount' => 'required',
            // 'status' => 'required',
            'beneficiary' => 'required',
            'transaction_pin' => 'required',
            // 'user_id' => 'required',
            // 'status' => 'required',
        ]);

        if($receiver = Account::where('wallet_id', $request->beneficiary)
        ->where('user_id', Auth::user()->id)->first()) {
            return response()->json([
                'success'=> false,
                'message'=> "You can't transfer from your wallet to your wallet",
                'amount'=> $request->amount,
                'user'=> $receiver,
            ],400);
        }

        if ($request->amount > 50000) {
            return response()->json([
                'success'=> false,
                'message'=> "maximum transfer amount is 50000 per time",
                'amount'=> $request->amount,
            ],400);
        } elseif ($request->amount < 100) {
            return response()->json([
                'success'=> false,
                'message'=> "minimum transfer amount is 100",
                'amount'=> $request->amount,
            ],402);
        }

        $transaction_pin = Auth::user()->accounts->transaction_pin;

        if (!Hash::check($request->transaction_pin, $transaction_pin)) {
            return response()->json([
                'success'=> false,
                'message'=> "Incorrect pin"
             ],401);
        }


        $transfer = Transfer::create([
            'ref_no' => $request->ref_no,
            'amount' => $request->amount,
            'user_id' => Auth::user()->id,
            'beneficiary' => $request->beneficiary,
            'status' => 1,
            ]);

            if($transfer){
                // top up amount.....here
                $causer_name = $request->beneficiary;
                $sender = Auth::user()->name;
                $transaction_type = "transfer";
                $details = "Wallet transfer has been made by $sender";

                $transaction_log = [
                    'ref_no' => $request->ref_no,
                    'transaction_type' => $transaction_type,
                    'amount' => $request->amount,
                    'user_id' => Auth::user()->id,
                    'details' => $details,
                    'beneficiary' => $causer_name,
                    'status' => 1,
                    'created_at' => Carbon::now()
                ];

                DB::table('transactions')->insert($transaction_log);

                }

                if($transaction_log){

                    $transfer->update(['status' => 1]);

                    $userAccount = Account::where('user_id', Auth::user()->id)->first();

                    $user_balance = $userAccount->balance - $transaction_log['amount'];

                    $userAccount->update(['balance' => $user_balance]);

                    $recipientAccount = Account::where('wallet_id', $request->beneficiary)->first();

                    $recipient_balance = $recipientAccount->balance + $transaction_log['amount'];

                    $recipientAccount->update(['balance' => $recipient_balance]);


                }

                try {
                    Mail::to($transfer->user->email)->send(new TransferMail($transfer));
                 } catch (\Throwable $th) {
                    //  throw $th;
                 }

            return response()->json([
                'success'=> true,
                'message'=> "transfer done successfully",
                'transfer'=> $transfer,
                'transaction log' => $transaction_log,
            ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $wallet_id)
    {
        // $user = User::where('id', user()->id)->first();
        $user_wallet = Account::where('wallet_id', $wallet_id)
        ->where('user_id',"<>", auth()->user()->id)
        ->with('user')->first();
        if (!$user_wallet) {
            return response()->json([
                'success'=> false,
                'message'=> "Wallet not found",
                // 'wallet'=> $user_wallet,
            ],401);
        }
        return response()->json([
            'success'=> true,
            'message'=> "Wallet found",
            'wallet'=> $user_wallet,
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function edit(Transfer $transfer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transfer $transfer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transfer $transfer)
    {
        //
    }
    public function verifypin()
    {

        $wallet=auth()->user()->accounts();
        $correct_pin=Hash::check(request()->transaction_pin, $wallet->pluck('transaction_pin')[0]);
        // dd(request()->transaction_pin, $wallet->pluck('transaction_pin')[0],$correct_pin);
        if (!$correct_pin) {
            $info=[
                'message'=>"Invalid Pin",
                'status'=>false,
                'wallet'=>$wallet
            ];
           return response()->json($info, 401);
        }

        if(request()->checkbalance && (request()->budget <= $wallet->pluck('balance')[0])){
            $info=[
                'message'=>"Insufficent fund",
                'status'=>false,
                'wallet'=>$wallet->pluck('balance')[0],
                'budget'=>request()->budget
            ];
           return response()->json($info, 401);
        }

        $data=[
            'message'=>"Correct Pin",
            'status'=>true,
        ];
        return response()->json($data, 200);

    }
}
