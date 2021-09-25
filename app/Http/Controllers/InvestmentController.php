<?php

namespace App\Http\Controllers;

use Throwable;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Account;
use App\Models\Package;
use App\Models\Referral;
use App\Models\Investment;
use Illuminate\Http\Request;
use App\Mail\EndInvestmentMail;
use App\Mail\StartInvestmentMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class InvestmentController extends Controller
{

    public function __construct() {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function list(){
        $userInvestments = Auth::user()->investments;
        return response()->json([
            'success'=> true,
            'message'=> "Investments found",
            'user investments'=> $userInvestments,
         ],200);
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            // 'user_id' => 'required',
            'package_id' => 'required',
        ]);

        $last_invest = Investment::where('user_id', Auth::user()->id)
                        ->where('status', '!=', 'paid')->first();

        if($last_invest){
            return response()->json([
                'success'=> false,
                'message'=> "Investment still in progress",
                'last_investment'=> $last_invest
             ],402);
        }

        $package = Package::where('id',request()->package_id)->first();

        $balance = Auth::user()->accounts->balance;
        // dd($package);
        $userAccount = Auth::user()->accounts;
        if($balance >= $package->price){
            $amount = $balance - $package->price;
            // $userAccount->update(['balance' => $amount]);
        }else{
            return response()->json([
                'success'=> false,
                'message'=> "Insufficient Fund"
             ],400);
        }

        $investment = Investment::create([
            'package_id' => request()->package_id,
            'user_id' => auth()->user()->id,
            'status' => "pending",
            'start_date' => Carbon::now(),
            // not sure of the add minute with days but use addDays
            'end_date' => Carbon::now()->addDays(7),
        ]);

        $userAccount->update(['balance' => $amount]);

        if($investment){
            // top up amount.....here
            $causer_name = Auth::user()->name;
            $transaction_type = "investment";
            $details = "investment has been made by $causer_name";

            $transaction_log = [
                'ref_no' => 'Ref'.now(),
                'transaction_type' => $transaction_type,
                'amount' => $package->price,
                'user_id' => Auth::user()->id,
                'details' => $details,
                'beneficiary' => $causer_name,
                'status' => 1,
                'created_at' => Carbon::now()
            ];

            DB::table('transactions')->insert($transaction_log);

            }

            if (request()->package_id == 1) {
                $ref_amount = 100;
            }
            if (request()->package_id == 2) {
                $ref_amount = 150;
            }
            if (request()->package_id == 3) {
                $ref_amount = 200;
            }
            if (request()->package_id == 4) {
                $ref_amount = 300;
            }
            if (request()->package_id == 5) {
                $ref_amount = 500;
            }
            if (request()->package_id == 6) {
                $ref_amount = 1000;
            }
            $ref_user = Auth::user()->refered_by;
            $owner_id = User::where('ref_code', $ref_user)->first();

            // new investment
            $new_referrals = Investment::where('user_id', Auth::user()->id)
            ->where('status','pending')
            ->where('status','completed')
            ->first();



            if (!$new_referrals && $owner_id) {
               // if user not already existed as refered_by creat new
            $alreadyRefBy=Referral::where('owner_id',$owner_id->id)
            ->where('user_id',Auth::user()->id)
            ->first();
          if(!$alreadyRefBy){
               $ref_log = [
                'status' => 1,
                'amount' => $ref_amount,
                'package_id' => request()->package_id,
                'investment_id' => $investment->id,
                'user_id' => Auth::user()->id,
                'owner_id' => $owner_id->id ,
                'created_at' => Carbon::now()
            ];
             DB::table('referrals')->insert($ref_log);
                $account=Account::where('user_id',$owner_id->id)->first();
                $balance=Account::where('user_id',$owner_id->id)->first();
                $account->update(['balance'=>$balance->balance+$ref_amount]);

            }
            }


        try {
            Mail::to($investment->user->email)->send(new StartInvestmentMail($investment, $package));
         } catch (\Throwable $th) {
            //  throw $th;
         }

        // return $package;
        return response()->json([
            'success'=> true,
            'message'=> "Investment created",
            'investment'=> $investment
         ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function lastInvestment(){

        $investment = Investment::where('user_id',Auth::user()->id)
        ->where('status','!=','paid')
        ->latest()->first();

        if (!$investment) {
            return response()->json([
                'success'=> false,
                'message'=> "recent investment not found",
                // 'investment'=> ['package'=>$package, 'invest'=> $investment],
             ],401);
        }

        $package = Package::where('id', $investment->package_id)->first();

        return response()->json([
            'success'=> true,
            'message'=> "recent investment found",
            'investment'=> ['package'=>$package, 'invest'=> $investment],
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
     * @param  \App\Models\Investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function show(Investment $investment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function edit(Investment $investment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $update_investments = DB::table('investments')
        ->where("user_id",auth()->user()->id)
        ->where('status', "pending")
        ->whereDate('end_date', '<=', Carbon::now())->update(['status' => "completed"]);
        return response()->json([
            'success'=> true,
            'message'=> "investment status updated",
            'update investment'=> $update_investments,
         ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Investment $investment)
    {
        //
    }

}
