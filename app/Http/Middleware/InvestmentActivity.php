<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Account;
use App\Models\Investment;
use Illuminate\Http\Request;
// use Illuminate\Filesystem\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class InvestmentActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */


    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            // $start_date = Carbon::now();
            // $end_date = Carbon::now()->addMinutes(3);
            // $package = Package::find($id);
            // $package->get();
            // $package_id = $package->id;
            $investor = Investment::where('user_id', Auth::user()->id)->get();
            $user_id = Auth::user()->id;
            // $price = $package->price;
            $balance = Auth::user()->accounts->balance;
            // $amount = $balance - $price;
            $userInvest = Auth::user()->investments;
            // $userAccount->update(['balance' => $amount]);
            $start_date = Carbon::now();
            $end_date = Carbon::now()->addDays(2); 
            $completed = 'Completed';


            /* already given time here we already set 2 min. */
            Cache::put('status' . $userInvest, true, $end_date);

            Cache::put('status', $completed, $end_date);

            /* user last seen */
            if($start_date > $end_date){
            $userInvest->update(['status' => $completed]);
            // User::where('id', Auth::user()->id)->update(['status' => $completed]);
            }
        }
        return $next($request);
    }
}
