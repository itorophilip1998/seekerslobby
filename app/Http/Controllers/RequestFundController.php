<?php

namespace App\Http\Controllers;

use App\Mail\ApprovedFundMail;
use Throwable;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Package;
use App\Models\Investment;
use App\Models\RequestFund;
use Illuminate\Http\Request;
use App\Mail\RequestFundMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RequestFundController extends Controller
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
        $this->validate($request,[
            // 'user_id' => 'required',
            // 'investment_id' => 'required',
        ]);


        $in_complete_invest = Investment::where('user_id', Auth::user()->id)
                        ->where('status', 'pending')->first();

        $check_pending_request = RequestFund::where('user_id', Auth::user()->id)
                        ->where('status', 0)->first();

        if($check_pending_request){
            return response()->json([
                'success'=> true,
                'message'=> "Your fund request is still pending",
                'check_pending_request'=> $check_pending_request,
            ],401);
        }



        if($in_complete_invest){
            return response()->json([
                'success'=> true,
                'message'=> "Your current investment is not yet due",
                'last_investment'=> $in_complete_invest
             ],402);
        }

        $complete_invest = Investment::where('user_id', Auth::user()->id)
                                ->where('status', 'completed')->first();

        // $fund_package = Package::where('id',$complete_invest->package_id)->first();

        if($complete_invest){

            // $package = Package::where('id',request()->package_id)->first();

            // $investment = Investment::where('id',request()->investment_id)->first();

            $requestfund = RequestFund::create([
                'status' => 0,
                'user_id' => auth()->user()->id,
                'investment_id' => $complete_invest->id,
            ]);

            // if($requestfund){
            //     // top up amount.....here
            //     $causer_name = Auth::user()->name;
            //     $transaction_type = "fund request";
            //     $details = "$transaction_type has been made by $causer_name";

            //     $transaction_log = [
            //         'ref_no' => 'Ref'.now(),
            //         'transaction_type' => $transaction_type,
            //         'amount' => $package_amount->price,
            //         'user_id' => Auth::user()->id,
            //         'details' => $details,
            //         'beneficiary' => $causer_name,
            //         'status' => 1,
            //         'created_at' => Carbon::now()
            //     ];

            //     DB::table('transactions')->insert($transaction_log);

            //     }



            try {
                Mail::to($requestfund->user->email)->send(new RequestFundMail($requestfund));
             } catch (\Throwable $th) {
                //  throw $th;
             }

            return response()->json([
                'success'=> true,
                'message'=> "Fund request initiated",
                'requestfund'=> $requestfund,
                // 'transaction_log'=> $transaction_log,
             ],200);
        }
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
     * @param  \App\Models\RequestFund  $requestFund
     * @return \Illuminate\Http\Response
     */
    public function show(RequestFund $requestFund)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RequestFund  $requestFund
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestFund $requestFund)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RequestFund  $requestFund
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $approve_fund = RequestFund::findOrFail($id);
        $owner = User::where('id', $approve_fund->user_id)->with('accounts')->first();
        $owner_account = $owner->accounts;
        $owner_balance = $owner->accounts->balance;
        // dd($owner->accounts->balance);
        $fund_investment = Investment::where('id', $approve_fund->investment_id)->where('status', 'completed')->first();
        // dd($fund_investment->package_id);
        if ($fund_investment->package_id == 1) {
            $user_profit = 6800;
        }
        if ($fund_investment->package_id == 2) {
            $user_profit = 10200;
        }
        if ($fund_investment->package_id == 3) {
            $user_profit = 13600;
        }
        if ($fund_investment->package_id == 4) {
            $user_profit = 20400;
        }
        if ($fund_investment->package_id == 5) {
            $user_profit = 34000;
        }
        if ($fund_investment->package_id == 6) {
            $user_profit = 68000;
        }

        $new_balance = $owner_balance + $user_profit;

        $owner_account->update(['balance' => $new_balance]);

        $approve_request = $approve_fund->update(['status'=>1]);

        try {
            Mail::to($approve_fund->user->email)->send(new ApprovedFundMail($approve_fund, $user_profit));
         } catch (\Throwable $th) {
            //  throw $th;
         }

        return response()->json([
            'success'=> true,
            'message'=> "User fund request has been approved",
            'approve_request'=> $approve_request,
         ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RequestFund  $requestFund
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestFund $requestFund)
    {
        //
    }

    public function checkRequest(){
        $check_pending_request = RequestFund::where('user_id', Auth::user()->id)
                                        ->where('status', 0)->latest()->first();
        return response()->json([
            'success'=> true,
            'message'=> "Your fund request is pending",
            'check_pending_request'=> $check_pending_request,
        ],200);

    }
}
