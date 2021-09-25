<?php

namespace App\Http\Controllers;

use Throwable;
use Carbon\Carbon;
use App\Models\Account;
use App\Models\BillPayment;
use Illuminate\Http\Request;
use App\Mail\BillPaymentMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BillPaymentController extends Controller
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
    public function create()
    {
        request()->validate([
            'reference' => 'required|string',
            'amount' => 'required|integer',
            'type' => 'required|string',
            'beneficiary' => 'required|string',
        ]);

        $billPayment = BillPayment::create([
            'ref_no' => request()->reference,
            'amount' => request()->amount,
            'type' => request()->type,
            'beneficiary' => request()->beneficiary,
            'details' => request()->details,
            'user_id' => Auth::user()->id,
        ]);

        if($billPayment){
            // top up amount.....here
            $causer_name = Auth::user()->name;
            $details = "Bill payment has been made by $causer_name";

            $transaction_log = [
                'ref_no' => request()->reference,
                'transaction_type' =>  request()->type,
                'amount' => request()->amount,
                'user_id' => Auth::user()->id,
                'details' => $details,
                'beneficiary' => $causer_name,
                'status' => 1,
                'created_at' => Carbon::now()
            ];

            DB::table('transactions')->insert($transaction_log);

            }

            if($transaction_log){
                // $billPayment->update(['status' => 1]);

                $userAccount = Account::where('user_id', Auth::user()->id)->first();

                $new_balance = $userAccount->balance - $transaction_log['amount'];

                $userAccount->update(['balance' => $new_balance]);

            }

            try {
                Mail::to($billPayment->user->email)->send(new BillPaymentMail($billPayment));
             } catch (\Throwable $th) {
                //  throw $th;
             }

        return response()->json([
            'success'=> true,
            'message'=> "billPayment done successfully",
            'deposit'=> $billPayment,
            'transaction log' => $billPayment,
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
     * @param  \App\Models\BillPayment  $billPayment
     * @return \Illuminate\Http\Response
     */
    public function show(BillPayment $billPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BillPayment  $billPayment
     * @return \Illuminate\Http\Response
     */
    public function edit(BillPayment $billPayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BillPayment  $billPayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BillPayment $billPayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BillPayment  $billPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(BillPayment $billPayment)
    {
        //
    }
}
