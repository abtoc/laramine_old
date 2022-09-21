<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;

class MyController extends Controller
{
    public function password()
    {
        return view('my.password');
    }

    public function password_update(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'new_password' => ['required', 'confirmed', 'different:password', Rules\Password::defaults()],
        ]); 

        $user = Auth::user();
        if(Hash::check($request->input('password'), $user->password)){
            $user->password = Hash::make($request->input('new_password'));
            $user->save();
            return to_route('home');
        }

        throw ValidationException::withMessages([
            'password' => [trans('auth.failed')],
        ]);
    }
}
