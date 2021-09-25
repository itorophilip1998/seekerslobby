<?php

namespace App\Http\Controllers;

use Throwable;
use Carbon\Carbon;
use App\Models\Account;
use App\Models\Deposit;
use App\Mail\DepositMail;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DepositController extends Controller
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
            'tx_ref' => 'required|string',
            'amount' => 'required',
            // 'user_id' => 'required',
            // 'status' => 'required',
        ]);

        if ($request->amount > 50000) {
            return response()->json([
                'success'=> false,
                'message'=> "maximum deposit amount is 50000 per time",
                'amount'=> $request->amount,
            ],400);
        } elseif ($request->amount < 500) {
            return response()->json([
                'success'=> false,
                'message'=> "minimum deposit amount is 500",
                'amount'=> $request->amount,
            ],402);
        }

        $deposit = Deposit::create([
            'ref_no' => $request->tx_ref,
            'amount' => $request->amount,
            'user_id' => Auth::user()->id,
            // 'status' => 1,
            ]);


            if($deposit){
            // top up amount.....here
            $causer_name = Auth::user()->name;
            $transaction_type = "deposit";
            $details = "Cash deposit has been made by $causer_name";

            $transaction_log = [
                'ref_no' => $request->tx_ref,
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
                $deposit->update(['status' => 1]);

                $userAccount = Account::where('user_id', Auth::user()->id)->first();

                $new_balance = $userAccount->balance + $transaction_log['amount'];

                $userAccount->update(['balance' => $new_balance]);

            }

            $user = Auth::user();

            try {
                Mail::to($deposit->user->email)->send(new DepositMail($deposit, $user));
             } catch (\Throwable $th) {
                //  throw $th;
             }

        return response()->json([
            'success'=> true,
            'message'=> "deposit done successfully",
            'deposit'=> $deposit,
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
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function show(Deposit $deposit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function edit(Deposit $deposit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deposit $deposit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deposit $deposit)
    {
        //
    }
}
