<?php

namespace App\Http\Controllers;
use Throwable;
use Carbon\Carbon;
use App\Models\Account;
use App\Models\Deposit;
use App\Models\Withdraw;
use App\Mail\DepositMail;
use App\Mail\WithdrawMail;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function check()
    {
        request()->validate([
            'amount' => 'integer|required',
            'transaction_pin' => 'string|required',
        ]);

        $balance = Auth::user()->accounts->balance;
        if($balance < request()->amount){
            return response()->json([
                'success'=> false,
                'message'=> "Insufficient Funds"
             ],400);
            }
        $transaction_pin = Auth::user()->accounts->transaction_pin;

            if (!Hash::check(request()->transaction_pin, $transaction_pin)) {
                return response()->json([
                    'success'=> false,
                    'message'=> "Incorrect pin"
                 ],401);
            }

            // if (!Hash::check(request()->transaction_pin, $transaction_pin)) {
                return response()->json([
                    'success'=> true,
                    'message'=> "All checked!"
                 ],200);
            // }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'reference' => 'string|required',
            'amount' => 'integer|required',
            'transaction_pin' => 'string|required',
            // 'status' => 'string|required',
        ]);

        $balance = Auth::user()->accounts->balance;
        $userAccount = Auth::user()->accounts;
        $balance = Auth::user()->accounts->balance;
        if($balance < request()->amount){
            return response()->json([
                'success'=> false,
                'message'=> "Insufficient Funds"
             ],400);
            }

        $transaction_pin = Auth::user()->accounts->transaction_pin;

        if (!Hash::check($request->transaction_pin, $transaction_pin)) {
            return response()->json([
                'success'=> false,
                'message'=> "Incorrect pin"
             ],401);
        }

        $withdraw = Withdraw::create([
            'ref_no' => $request->reference,
            'amount' => $request->amount,
            'user_id' => Auth::user()->id,
            // 'status' => 1,
        ]);

        // if($withdraw){
            // top up amount.....here
            // $balance = Auth::user()->accounts->balance;
            // $userAccount = Auth::user()->accounts;
            // if($balance >= $request->amount){
            //     $amount = $balance - $request->amount;
            //     // dd($amount);
            //     $userAccount->update(['balance' => $amount]);
            //     // dd($userAccount);
            // }else{
            //     return response()->json([
            //         'success'=> false,
            //         'message'=> "Insufficient Funds"
            //      ],400);
            // }

            // $transaction_pin = Auth::user()->accounts->transaction_pin;

            // if (!Hash::check($request->transaction_pin, $transaction_pin)) {
            //     return response()->json([
            //         'success'=> false,
            //         'message'=> "Incorrect pin"
            //      ],401);
            // }

            $userAccount->update(['balance' => $amount]);

            // $amount = $balance - $request->amount;
            // $userAccount->update(['balance' => $amount]);

            $causer_name = Auth::user()->name;
            $transaction_type = "withdraw";
            $details = "Cash withdrawal has been made by $causer_name";

            $transaction_log = [
                'ref_no' => $request->reference,
                'transaction_type' => $transaction_type,
                'amount' => $request->amount,
                'user_id' => Auth::user()->id,
                'details' => $details,
                'beneficiary' => $causer_name,
                'status' => 1,
                'created_at' => Carbon::now()
            ];

            DB::table('transactions')->insert($transaction_log);


            // if()

            if($transaction_log != null){

                $withdraw->update(['status' => 1]);

            }

            $user = Auth::user();

            try {
                Mail::to($withdraw->user->email)->send(new WithdrawMail($withdraw, $user));
             } catch (\Throwable $th) {
                //  throw $th;
             }

        return response()->json([
            'success'=> true,
            'message'=> "withdrawal done successfully",
            'withdraw'=> $withdraw,
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
     * @param  \App\Models\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function show(Withdraw $withdraw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function edit(Withdraw $withdraw)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Withdraw $withdraw)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function destroy(Withdraw $withdraw)
    {
        //
    }
}
