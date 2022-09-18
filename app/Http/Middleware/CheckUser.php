<?php

namespace App\Http\Middleware;

use Closure;
use App\Enums\UserStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Prologue\Alerts\Facades\Alert;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->user()->must_change_passwd){
            Alert::warning(__('Please change your password.'));
            Alert::flash();
            return to_route('my.password');
        }
        if($request->user()->status !== UserStatus::ACTIVE){
            Auth::logout();
            Alert::warning(__('Pending system administrator approval.'));
            Alert::flash();
            return to_route('login');
        }
        return $next($request);
    }
}
