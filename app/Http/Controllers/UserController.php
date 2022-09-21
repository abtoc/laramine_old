<?php

namespace App\Http\Controllers;

use App\Enums\UserStatus;
use App\Enums\UserType;
use App\Models\User;
use App\Rules\IdentiferRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::whereType(UserType::USER);
        if($request->has('status') and $request->query('status') !== '0'){
            $query = $query->where('status', (int)($request->query('status')));
        }
        if($request->has('name') and $request->query('name') != null){
            $query = $query->where('name', 'LIKE', '%'.$request->query('name').'%');
        }
        $users = $query->sortable()->paginate(10);
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
            'login' => ['required', 'string', 'max:255', 'unique:users', new IdentiferRule()],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:email_addresses'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user = new User();
        $user->fill($request->all());
        $user->type = UserType::USER;
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return to_route('users.index', $request->query());
    }

    public function show(User $user)
    {
        if($user->type !== UserType::USER){
            abort(404);
        }        
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        if($user->type !== UserType::USER){
            abort(404);
        }        
        return view('users.edit', compact('user'));
    }

    public function update(Request $request,User $user)
    {
        if($user->type !== UserType::USER){
            abort(404);
        }        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'login' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id), new LoginRule()],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('email_addresses')->ignore($user->email_addresses()->where('is_default', '=', true)->first()->id)],
        ]);
        $user->fill($request->all());
        $user->save();
        return to_route('users.index', $request->query());
    }

    public function destroy(Request $request, User $user)
    {
        if($user->type !== UserType::USER){
            abort(404);
        }        
        if(Auth::id() !== $user->id){
            $user->delete();
        }
        return to_route('users.index', $request->query());
    }

    public function lock(Request $request, User $user)
    {
        if($user->type !== UserType::USER){
            abort(404);
        }        
        if(Auth::id() !== $user->id){
            $user->status = UserStatus::LOCKED;
            $user->save();
        }
        return to_route('users.index', $request->query());
    }

    public function active(Request $request, User $user)
    {
        if($user->type !== UserType::USER){
            abort(404);
        }        
        if(Auth::id() !== $user->id){
            $user->status = UserStatus::ACTIVE;
            $user->save();
        }
        return to_route('users.index', $request->query());
    }
}
