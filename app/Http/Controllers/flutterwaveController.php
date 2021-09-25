<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Mail\Reset;
use App\Models\Logs;
use App\Models\User;
use App\Mail\Verifyme;
use GuzzleHttp\Client;
use App\Models\Account;
use App\Models\BillPayment;
use Illuminate\Support\Str;
use App\Mail\BillPaymentMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class flutterwaveController extends Controller
{

public $baseurl="https://api.flutterwave.com/v3/";
public $auth="Bearer FLWSECK-976340cea1a7f437bcc51210ff0745cb-X";

public function __construct() {
        $this->middleware('auth:api');
}
    // get bill categories
public function billCategories(){
    $client = new Client();
    $response = $client->request('GET', $this->baseurl.'bill-categories', [
        'headers' => [
            'Authorization' => $this->auth,
        ]
    ]);
    $statusCode = $response->getStatusCode();
    $body = json_decode($response->getBody()->getContents());
    return  response()->json($body,200);
}

// paybills
public function payBills(){
    request()->validate([
        'reference' => 'required|string',
        'amount' => 'required|integer',
        'type' => 'required|string',
        'user_id' => 'required',
    ]);
    $client = new Client();
    $response = $client->request('POST',$this->baseurl.'bills', [
        'headers' => [
            'Authorization' => $this->auth,
        ],
        'json'=> request()->all()
    ]);
    // $statusCode = $response->getStatusCode();
    $body = json_decode($response->getBody()->getContents());

    $causer_name = User::where('id',request()->user_id)->first()->name;
    $details = "Bill payment has been made by $causer_name";
    $per=request()->amount / 100 * 1;
    $chargedAmount=request()->amount - $per ;
    $billPayment = BillPayment::create([
        'ref_no' => request()->reference,
        'amount' => (request()->data_type=='airtime') ? $chargedAmount: request()->amount,
        'type' => request()->data_type,
        'beneficiary' => request()->customer,
        'details' => $details,
        'user_id' => request()->user_id,
    ]);

    if($billPayment){
        // top up amount.....here
        $transaction_log = [
            'ref_no' => request()->reference,
            'transaction_type' =>  request()->data_type,
            'amount' => (request()->data_type=='airtime') ? $chargedAmount: request()->amount,
            'user_id' => request()->user_id,
            'details' => $details,
            'beneficiary' => $causer_name,
            'status' => 1,
            'created_at' => Carbon::now()
        ];

        DB::table('transactions')->insert($transaction_log);
        }

        if($transaction_log){
            // $billPayment->update(['status' => 1]);

            $userAccount = Account::where('user_id', request()->user_id)->first();

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
        'airtime' => $body,
    ],200);
    // return  response()->json($body,200);
}
// transfers
public function transfers(Request $request){
    $client = new Client();
    $response = $client->request('POST',$this->baseurl.'transfers', [
        'headers' => [
            'Authorization' => $this->auth,
        ],
        'json'=> request()->all()
    ]);
    $statusCode = $response->getStatusCode();
   $body = json_decode($response->getBody()->getContents());
    return  response()->json($body,200);
}

// transfer
public function transfer($id){
    $client = new Client();
    $response = $client->request('GET',$this->baseurl.'transfers/'.$id, [
        'headers' => [
            'Authorization' => $this->auth,
        ],
        'json'=> request()->all()
    ]);
    $statusCode = $response->getStatusCode();
    $body = json_decode($response->getBody()->getContents());
    return  response()->json($body,200);
}

// balance
public function balance(){
    $client = new Client();
    $response = $client->request('GET',$this->baseurl.'/balances/NGN', [
        'headers' => [
            'Authorization' => $this->auth,
        ],
        'json'=> request()->all()
    ]);
    $statusCode = $response->getStatusCode();
    $body = json_decode($response->getBody()->getContents());
    return  response()->json($body,200);
}

}
