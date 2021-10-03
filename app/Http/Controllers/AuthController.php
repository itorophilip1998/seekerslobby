<?php

namespace App\Http\Controllers;

use Throwable;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Profile;
use App\Mail\VerifyMail;
use App\Mail\PinResetMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\PasswordResetMail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public $baseurl="http://localhost:3000";

    // public $token = true;

    public function __construct() {
        $this->middleware('auth:api', ['except' => ['signin', 'signup', 'verified', 'resendLink','resetVerify','resetPassword', 'forgotPassword', 'forgotPin', 'resetPin']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function signin(Request $request){
    	$validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!$token = auth()->attempt($validator->validated())) {
            return response()->json(['message' => 'Invalid Credential'], 401);
        }

        $user=User::where('email',$request->email)
        ->where('email_verified_at','!=',NULL)->first();

        $banned_user = User::where('email',$request->email)
        ->where('is_ban','=', 1)->first();
      //   check whether email is verified
        if($banned_user){
            return response()->json(['message' => 'Your account has been suspended temporarily'], 402);
        }
        if (!$user) {
          return response()->json(['message' => 'Email not verified'], 403);
        }

        return $this->createNewToken($token);
    }

    public function resendLink(Request $request){
        $request->validate([
            'email' => 'required|string|email'
        ]);
         $user=User::where('email',$request->email)->first();
         return $this->sendCode($user);
    }

    public function sendCode($user)
    {
        // initialize and update code here
        $verification_code = Str::random(5);
        $email = $user->email;
        $url = "api/auth/web-verified/$email/$verification_code";
        $user->update(['verification_code'=>$verification_code]);
        // send code to mail here example token to email
       try {
            Mail::to($user->email)->send(new VerifyMail($user, $verification_code, $url, $email));
       } catch (\Throwable $th) {
           throw $th;
       }

        return response()->json([
            'success'=> true,
            'message'=> "We have sent a verification to your email address",
            'email'=> $user->email,
         ],200);

    }

    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function signup(Request $request) {
        $request->validate([
            'name' => 'required|string|between:5,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:5|max:15',
            'role' => 'nullable|string|max:15',
            'verification_code' => 'nullable|string|max:15',
        ]);

        $verification_code = Str::random(5);
        // dd(request()->all());
        $user=User::create([
            'name'=> $request->name,
            'password' => Hash::make($request->password),
            'email'=> $request->email,
            'oauth'=> false,
            'role'=> $request->role,
            'verification_code' => $verification_code,
            ]);

        $email = $user->email;
        $url = "/api/auth/verified/$email/$verification_code";

        $user->profile()->create([
            'user_id'=>$user->id,
            ]);
        
        try {
            Mail::to($user->email)->send(new VerifyMail($user, $verification_code, $url, $email));
        } catch (\Throwable $th) {
            throw $th;
        }


        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user,
        ], 201);
    }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function signout() {
        auth()->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    // public function me() {
    //     $user = User::where('id',auth()->user()->id)
    //     ->with('accounts', 'investments', 'transactions')
    //     ->first();
    //     return response()->json($user,200);
    // }

    public function userProfile(){
        $user_profile = Profile::where('user_id', Auth::user()->id)->get();
        return response()->json([
            'success'=> true,
            'message'=> "User profile found",
            'user_profile'=> $user_profile,
         ],200);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            // you dont fix maximium expired at here, it in config/auth.php
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => User::where('id',auth()->user()->id)->with('profile')->first()
        ],200);
    }

    public function verified($email,$verification_code)
    {
        $user = User::where('email',$email)
        ->where('verification_code',$verification_code)->first();
        // invalid code or email from user
       if (!$user) {
        return response()->json(['success'=> false, 'message'=> "Verification code or Email is invalid."],401);
       }
    //    verify user now
       $verified_mail = Carbon::now();
       $user->update(['email_verified_at' => $verified_mail]);

       return redirect($this->baseurl."/auth/signin?email=$email");
       }




    // public function resetVerify(){
    //     request()->validate( [
    //         'email' => 'required|string|email',
    //         'pin_reset' => 'required'
    //     ]);
    //     $email=request()->email;
    //     $user=User::where('email',request()->email)->first();
    //     if(!$user)
    //     {
    //     return response()->json(['success'=> false, 'message'=> "Email not found!"],401);
    //     }

    //     $token=Str::random(10);
    //     //  save token and mail to reset table
    //     $check= DB::table('password_resets')->where('email',request()->email);
    //     $checkpin= DB::table('pin_resets')->where('email',request()->email);
    //     if(!request()->pin_reset){
    //         $item="Password";
    //         $url='password';
    //         if(!$check->first()){
    //        $data= DB::table('password_resets')->insert([
    //             'email'=>$email,
    //             'token'=>$token,
    //             'created_at'=>now()
    //          ]);
    //     }
    //     else{
    //        $check->update([
    //             'email'=>$email,
    //             'token'=>$token,
    //             'created_at'=>now()
    //        ]);
    //      }
    //     }else{
    //         $item="Transaction Pin";
    //         $url="pin";
    //         if(!$checkpin->first()){
    //             $data= DB::table('pin_resets')->insert([
    //                  'email'=>$email,
    //                  'token'=>$token,
    //                  'created_at'=>now()
    //               ]);
    //          }
    //          else{
    //             $checkpin->update([
    //                  'email'=>$email,
    //                  'token'=>$token,
    //                  'created_at'=>now()
    //             ]);
    //           }
    //     }

    //     //   send token and mail to email as a reset link example (url/reset/{token}/{email})
    //     // $link="$this->baseurl/user/reset-$url?$token#$email";
    //     $subject="Reset $item";
    //     $data=[
    //         'name'=>"Hello $user->name",
    //         'content'=>"You have just requested for a $item reset link.",
    //         'link'=>$link
    //     ];
    //     try {
    //         // Mail::to(request()->email)->send(new Reset($subject, $email, $data));
    //      } catch (\Throwable $th) {
    //          //throw $th;
    //      }
    //     return response()->json(['success'=> true, 'message'=> "A reset link has been sent to your email $email"]);
    // }

    public function resetPassword(){

        request()->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed|min:5',
            'token' => 'required|string|min:10',
        ]);

        $check= DB::table('password_resets')->where('email',request()->email)
        ->where('token',request()->token);
        if(!$check->first())
        {
           return response()->json(['success'=> false, 'message'=> "Invalid Email or Token"],401);
        }
        $user = User::where('email',$check->first()->email)->update(['password'=>Hash::make(request()->password)]);
        $check->delete();
        return response()->json(['success'=> true, 'message'=> "Password Updated"],200);

    }

    public function resetPin(){
        request()->validate([
            'email' => 'required|string|email',
            'pin' => 'required|confirmed|digits:4|numeric',
            'token' => 'required|string|min:10',
        ]);
        $check= DB::table('pin_resets')->where('email',request()->email)
        ->where('token',request()->token);
        if(!$check->first())
        {
           return response()->json(['success'=> false, 'message'=> "Invalid Email"],401);
        }
        $user=User::where('email',$check->first()->email)->with('accounts')->first();
        $active=$user->accounts->is_active;
        if(!$active){
           return response()->json(['success'=> false, 'message'=> "Account is not activated!"],402);
        }
        $user->accounts->update(['transaction_pin'=>Hash::make(request()->pin)]);
        $check->delete();
        return response()->json(['success'=> true, 'message'=> "Pin Updated"],200);
    }

    public function forgotPassword(Request $request){
        // If email does not exist
        request()->validate( [
            'email' => 'required|string|email',
        ]);
        $email = request()->email;
        $user = User::where('email', $email)->first();
        if(!$user) {
            return response()->json(['success'=> false,
            'message'=> "Email not found!"],401);
        }

            // If email exists
            $token = Str::random(10);

            $isOtherToken = DB::table('password_resets')->where('email', $email);

            // if($isOtherToken) {

            //     $isOtherToken->token;
            // }

            $url=$this->baseurl."/auth/reset-password?token=$token&email=$email";

            // $token = Str::random(10);
            if(!$isOtherToken->first()){
                $data= DB::table('password_resets')->insert([
                     'email'=>$email,
                     'token'=>$token,
                     'created_at'=>now()
                  ]);
             }
             else{
                $isOtherToken->update([
                     'email'=>$email,
                     'token'=>$token,
                     'created_at'=>now()
                ]);
              }

            // $isOtherToken = DB::table('password_resets')->insert([
            //     'email' => $email,
            //     'token' => $token,
            //     'created_at' => Carbon::now()
            // ]);


            //  save token and mail to reset table
            $isOtherToken = DB::table('password_resets')->where('email',request()->email);


            try {

                Mail::to($email)->send(new PasswordResetMail( $email, $token, $user, $url));

             } catch (\Throwable $th) {
                 //throw $th;
             }

            return response()->json(['success'=> true,
            'message'=> "A reset link has been sent to your email"]);

    }

    public function forgotPin(Request $request){
        // If email does not exist
        request()->validate( [
            'email' => 'required|string|email',
        ]);
        $email = request()->email;
        $user = User::where('email', $email)->first();
        if(!$user) {
            return response()->json(['success'=> false,
            'message'=> "Email not found!"],401);
        } else {
            // If email exists
            $token = Str::random(10);

            $isPinToken = DB::table('pin_resets')->where('email', $email);

            $url=$this->baseurl."/auth/reset-pin?token=$token&email=$email";

            // $token = Str::random(10);
            if(!$isPinToken->first()){
                $data= DB::table('pin_resets')->insert([
                     'email'=>$email,
                     'token'=>$token,
                     'created_at'=>now()
                  ]);
             }
             else{
                $isPinToken->update([
                     'email'=>$email,
                     'token'=>$token,
                     'created_at'=>now()
                ]);
              }
            // $isOtherToken = DB::table('password_resets')->insert([
            //     'email' => $email,
            //     'token' => $token,
            //     'created_at' => Carbon::now()
            // ]);


            //  save token and mail to reset table
            $isPinToken = DB::table('pin_resets')->where('email',request()->email);


            try {

                Mail::to($email)->send(new PinResetMail( $email, $token, $user, $url));

             } catch (\Throwable $th) {
                 //throw $th;
             }

            return response()->json(['success'=> true,
            'message'=> "A pin reset link has been sent to your email"]);

        }
    }

    public function updateLock(Request $request){
        $user = User::find(auth()->user()->id);
        $request->validate(['is_lock' => 'required|boolean']);
        $user->update(['is_lock' =>  $request->is_lock]);
        return response()->json(['success'=> true, 'message'=> "IsLock Updated"],200);
    }

    public function referrals(){
        $referrals = User::where('refered_by', Auth::user()->ref_code)->get();
        return response()->json([
            'success'=> true,
            'message'=> "Referrals found",
            'referrals'=> $referrals,
         ],200);
    }

    public function todayReferrals(){

        $today_referrals = User::where('refered_by', Auth::user()->ref_code)
        ->whereDate('created_at', Carbon::today())
        ->get();
        return response()->json([
            'success'=> true,
            'message'=> "Todays referrals found",
            'referrals'=> $today_referrals,
         ],200);
    }

    public function AllReferrals(){
        $referrals = Referral::where('owner_id', Auth::user()->id)->first();

        $referrals_total_amount = Referral::where('owner_id', Auth::user()->id)
        ->sum('amount');
        if (!$referrals) {
            return response()->json([
                'success'=> false,
                'message'=> "Referrals not found",
             ],401);
        }



        if (!$referrals_total_amount) {
            return response()->json([
                'success'=> false,
                'message'=> "Referrals total amount not found",
             ],401);
        }

        $today_referrals = Referral::where('owner_id', Auth::user()->id)
        ->whereDate('created_at', Carbon::today())
        ->first();

        $referrals_today_amount = Referral::where('owner_id', Auth::user()->id)
        ->whereDate('created_at', Carbon::today())
        ->sum('amount');
        // ->first();



     return response()->json([
            'success'=> true,
            'message'=> "Referrals found",
            'today_referrals'=> $today_referrals,
            'referrals'=> $referrals,
            'referrals_today_amount'=> (int)$referrals_today_amount,
            'referrals_total_amount'=> (int)$referrals_total_amount,
         ],200);

        }



}
