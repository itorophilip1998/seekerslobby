<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
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

    public function create(Request $request)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function creater()
    {



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
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $account = Account::where('user_id', Auth::user()->id)->first();
        $this->validate($request,[
            'transaction_pin' => 'nullable|digits:4',
            'bank_name' => 'nullable|string|min:1|max:100',
            'account_no' => 'nullable|max:10',
            'account_name' => 'nullable|string|min:1|max:100',
            'phone_no' => 'nullable|string|min:10|max:11',
            'bank_code' => 'nullable|string',
            'recipient_code' => 'nullable|string',
            'recipient_id' => 'nullable|integer',
        ]);

        $account->update([
            'bank_name' => $request->bank_name,
            'account_name' => $request->account_name,
            'account_no' => $request->account_no,
            'phone_no' => $request->phone_no,
            'bank_code' => $request->bank_code,
            'recipient_code' => $request->recipient_code,
            'recipient_id' => $request->recipient_id,
        ]);
        if(request()->transaction_pin){
            $account->update(['transaction_pin' => Hash::make($request->transaction_pin)]);
        }

        if($account){
            $account->update(['is_active' => 1]);
        } else {
            "Account not yet updated!";
        }

        return response()->json([
            'message' => 'Account successfully updated',
            'account' => $account,
        ], 201);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }
}
