<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Cache;
use App\Models\User;

class UserMiddleware
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
        // user banned & unbanned

        if (Auth::check() && Auth::user()->isban) {
            $banned = Auth::user()->isban == '1';
            Auth::logout();

            if ($banned == 1) {
               $message = "Your Account Has Been Banned.Please Contact With Admin";
            }
             return redirect()->route('login')->with('status', $message)->withErrors([
                'banned' => 'Your Account Has been Banned. Please Contact Administrator'
            ]);
        }

        // user active 

        if (Auth::check()) {
            $expireTime = Carbon::now()->addSeconds(30);
            Cache::put('user-is-online' . Auth::user()->id, true, $expireTime);
            User::where('id', Auth::user()->id)->update(['last_seen' => Carbon::now()]);

        }

        




        if (Auth::check() && Auth::user()->roled_id == 2) {
            return $next($request);
        }else{
            return redirect()->route('login');
        }
    }
}
