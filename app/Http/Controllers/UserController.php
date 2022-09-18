<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\LoginRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::sortable()->paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'login' => ['required', 'string', 'max:255', 'unique:users', new LoginRule()],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:email_addresses'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return to_route('users.index');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request,User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'login' => ['required', 'string', 'max:255', 'unique:users', new LoginRule()],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('email_addresses')->ignore($user->email_addresses()->where('is_default', '=', true)->first()->id)],
        ]);
        $user->fill($request->all());
        $user->save();
        return to_route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return to_route('users.index');
    }
}
