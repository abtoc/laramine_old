<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class GroupUsers extends Component
{
    public $group;
    public $users;

    public function mount($group)
    {
        $this->group = $group;
        $this->users = $group->users;
    }

    public function destroy($id)
    {
        DB::table('groups_users')->where('group_id', $this->group->id)->where('user_id', $id)->delete();
        $new_users = $this->users->filter(function($value, $key) use($id) {
            return $value->id !== $id;
        });
        $this->users = $new_users;
    }

    public function render()
    {
        return view('livewire.group-users');
    }
}
