<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Mail\AdminPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class AdminPasswordJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // $details = [
        //     'title' => 'Thank you for subscribing to my newsletter',
        //     'body' => 'You will receive a newsletter every Fourth Friday of the month'

        // ];
        $new_password = Str::random(10);
        $admin = User::where('role', 'admin')->update(['password' => Hash::make($new_password)]);
        // $admin_mail = Mail::to('gideonmoses11@gmail.com')->send(new AdminPasswordMail($admin));
        Mail::to('gideonmoses11@gmail.com')->send(new AdminPasswordMail($admin));
    }
}
