<?php

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use App\Jobs\AdminPasswordJob;
use App\Mail\AdminPasswordMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('password:update', function () {

    $new_password = Str::random(10);
    // $admin_mail = Mail::to('gideonmoses11@gmail.com')->send(new AdminPasswordMail($admin));
    $admin_mail = User::where('role', 'admin')->update(['password' => Hash::make($new_password)]);
    
    // $admin_pass = User::where('role', 'admin')->pluck('password');

    Mail::raw("Hello Admin! Here's your password for today: $new_password", function ($message){
        $message->to('gideonmoses11@gmail.com')
        ->subject('Admin Password Update');
    });

})->purpose('Updates Admins password');
