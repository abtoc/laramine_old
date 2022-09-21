<?php

namespace App\Http\Controllers;

use App\Enums\UserStatus;
use App\Enums\UserType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GroupController extends Controller
{
    public function index(Request $request)
    {
        $query = User::whereIn('type', [UserType::GROUP, UserType::GROUP_ANONYMOUS, UserType::GROUP_NON_MEMBER]);
        if($request->has('name') and $request->query('name') != null){
            $query = $query->where('name', 'LIKE', '%'.$request->query('name').'%');
        }
        $users = $query->orderBy('name', 'asc')->paginate(10);
        return view('groups.index', compact('users'));
    }

    public function create()
    {
        return view('groups.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);
        $user = new User();
        $user->type = UserType::GROUP;
        $user->name = $request->input('name');
        $user->save();

        return to_route('groups.index', $request->query());
    }

    public function edit(User $user)
    {
        if(!in_array($user->type, [UserType::GROUP, UserType::GROUP_ANONYMOUS, UserType::GROUP_NON_MEMBER])){
            abort(404);
        }
        return view('groups.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if(!in_array($user->type, [UserType::GROUP, UserType::GROUP_ANONYMOUS, UserType::GROUP_NON_MEMBER])){
            abort(404);
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        if($user->type === UserType::GROUP){
            $user->fill($request->all());
            $user->save();
        }

        return to_route('groups.index', $request->query());
    }

    public function destroy(Request $request, User $user)
    {
        if(!in_array($user->type, [UserType::GROUP, UserType::GROUP_ANONYMOUS, UserType::GROUP_NON_MEMBER])){
            abort(404);
        }
        $user->delete();
        return to_route('groups.index', $request->query());
    }

    public function users(User $user)
    {
        return view('groups.users', compact('user'));
    }

    public function users_destroy(Request $request, User $user, $id)
    {
        DB::table('groups_users')->where('group_id', $user->id)->where('user_id',  $id)->delete();
        return to_route('groups.users', array_merge(['user' => $user->id], $request->query()));
    }
}
