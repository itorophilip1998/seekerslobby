<?php

namespace App\Http\Controllers;

use Auth;
use Throwable;
use App\Models\User;
use App\Models\Account;
use App\Models\Contact;
use App\Models\Deposit;
use App\Models\Package;
use App\Models\Referral;
use App\Models\Transfer;
use App\Models\Withdraw;
use App\Mail\ContactMail;
use App\Models\Investment;
use App\Models\Newsletter;
use App\Models\BillPayment;
use App\Models\RequestFund;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Mail\ApprovedFundMail;
use App\Mail\ContactReplyMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public $baseurl="http://localhost:3000";

    // public $token = true;

    public function __construct() {
        $this->middleware('admin', ['except' => ['adminLogin']]);
    }

    public function me() {
        $user = User::where('id',auth()->user()->id)
        // ->with('accounts', 'investments', 'transactions')
        ->first();
        return response()->json($user,200);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {

        $contacts = Contact::latest()->get();

        $user_accounts = User::where('role', 'user')->with('accounts')->latest()->get();

        $news_letters = Newsletter::latest()->get();

        $packages = Package::latest()->get();

        $referrals = Referral::latest()->get();

        $investments = Investment::with('user')->latest()->get();

        $requestfunds = RequestFund::with('user')->latest()->get();

        $bill_payments = BillPayment::with('user')->latest()->get();

        $deposits = Deposit::with('user')->latest()->get();

        $transactions = Transaction::with('user')->latest()->get();

        $transfers = Transfer::with('user')->latest()->get();

        $withdraws = Withdraw::with('user')->latest()->get();

        $banned_users = User::where('is_ban', 1)->latest()->get();

        $paid_users = Investment::where('status', 'paid')->latest()->get();

        $replies = Contact::where('status', 1)->latest()->get();

        $accounts_balance = DB::table('accounts')->sum('balance');

        return response()->json([
            'message'=> "Users properties found",
            'user_accounts'=> $user_accounts,
            'contact_us'=> $contacts,
            'deposits'=> $deposits,
            'investments'=> $investments,
            'transactions'=> $transactions,
            'bill_payments'=> $bill_payments,
            'packages'=> $packages,
            'news_letters'=> $news_letters,
            'withdraws'=> $withdraws,
            'referrals'=> $referrals,
            'transfers'=> $transfers,
            'requestfunds'=> $requestfunds,
            'banned_users' => $banned_users,
            'replies' => $replies,
            'paid_users' => $paid_users,
            'accounts_balance'=> (int)$accounts_balance,
            // 'approved_requests' => $approved_requests

            ],200);

    }

    public function adminLogin(Request $request){
    	$validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!$token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $admin = User::where('email', $request->email)
        ->where('role','admin')->first();

        if (!$admin) {
          return response()
          ->json(['message' => 'You cannot access this page',
                    'error' => 'Forbidden'], 403);
        }

        return $this->createNewToken($token);
    }

    // public function adminLogin(Request $request){
    // 	$validator = Validator::make($request->all(), [
    //         'email' => 'required|string|email',
    //         'password' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json($validator->errors(), 422);
    //     }

    //     if (!$token = auth()->attempt($validator->validated())) {
    //         return response()->json(['error' => 'Unauthorized'], 401);
    //     }

    //     return $this->createNewToken($token);
    // }

    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            // you dont fix maximium expired at here, it in config/auth.php
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'admin' => User::where('id',auth()->user()->id)->where('role', 'admin')->first()
        ],200);
    }

    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }
    public function message($email) {
        $data=Contact::where('email',$email)->first();
        return response()->json($data,200);
    }

    public function banUser(Request $request, $id){
        $ban_user = User::findOrFail($id);
        $banned_user = $ban_user->update(['is_ban'=>1]);

        return response()->json([
            'success'=> true,
            'message'=> "User has been banned",
            'ban_user'=> $banned_user,
         ],200);
    }

    public function bannedUsers(Request $request){
        $banned_accounts = User::where('is_ban', 1)->get();
        return response()->json([
            'success'=> true,
            'message'=> "banned users found",
            'banned_accounts'=> $banned_accounts,
         ],200);
    }

    public function totalAccountBalance(){
        $balance = DB::table('accounts')->sum('balance');
        return response()->json([
            'success'=> true,
            'message'=> "total accounts balance found",
            'balance'=> (int)$balance,
         ],200);
    }

    public function updateFund(Request $request, $id)
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         $request->validate([
                'id' => 'required',
                'email' => 'required',
                'message' => 'required',
            ]);
        // $all_request = $request->all();
        $contact_reply = Contact::find(request()->id);
        try {
            Mail::to($request->email)->send(new ContactReplyMail(request()->all(), $contact_reply));
            $contact_reply->update(['status'=>true]);
        } catch (\Throwable $th) {
            return response()->json(['message'=>'Message unable to send!'], 401);
        }
        return response()->json(['message'=>'Mail sent successfully!',$contact_reply ], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
