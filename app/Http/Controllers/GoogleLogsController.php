<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleLogsController extends Controller
{
    public $baseurl="localhost::3000";
   public function getGoogleData()
   {
       try {
        return Socialite::driver('google')->redirect();
       } catch (\Throwable $th) {
        //    throw $th;
       }
   }

   public function handleProviderCallback()
   {
    try {
        $user = Socialite::driver('google')->user();
        return $this->google($user);
       } catch (\Throwable $th) {
        //    throw $th;
       }

   }

   public function google($user)
   {

       $oldUser=User::where('email',$user->email)
       ->where('oauth',true)
       ->first();


    if(!$oldUser)
    {
         $newUser=User::create([
             'name'=>$user->name,
             'email'=>$user->email,
             'email_verified_at'=>now(),
             'remember_token'=>Str::random(10),
             'oauth'=>true,
             'password'=>Hash::make($user->id),
         ]);
              // update code
          $newUser->update([
                'ref_code' => "R".$newUser->id.Str::random(8)
            ]);

            // create account
          $newUser->accounts()->create([
            'user_id'=>$newUser->id,
            'wallet_id'=>"W".$newUser->id.Time()
              ]);

    }
    else if($oldUser){
        return $this->respondWithToken($user->email,$user->id);
    }

     return redirect('https://www.paddipay.com/');

   }

   public function respondWithToken($email,$password)
   {
       return redirect("http://localhost:3000/callback?e=$email&p=$password");
   }

}
