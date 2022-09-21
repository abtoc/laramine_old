<?php

namespace Database\Seeders;

use App\Enums\ProjectStatus;
use App\Enums\UserType;
use App\Enums\UserStatus;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // users
        User::where('login', 'admin')
            ->update([
                'must_change_password' => false,
            ]);
        $password = Hash::make("P@ssw0rd");
        $user_template = ['type' => UserType::USER, 'password' => $password, ];
        $users = [
            array_merge($user_template, ['name' => 'テストユーザ01', 'login' => 'test01', 'email' => 'test01@testtest.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ02', 'login' => 'test02', 'email' => 'test02@testtest.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ03', 'login' => 'test03', 'email' => 'test03@testtest.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ04', 'login' => 'test04', 'email' => 'test04@testtest.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ05', 'login' => 'test05', 'email' => 'test05@testtest.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ06', 'login' => 'test06', 'email' => 'test06@testtest.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ07', 'login' => 'test07', 'email' => 'test07@testtest.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ08', 'login' => 'test08', 'email' => 'test08@testtest.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ09', 'login' => 'test09', 'email' => 'test09@testtest.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ10', 'login' => 'test10', 'email' => 'test10@testtest.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ11', 'login' => 'test11', 'email' => 'test11@testtest.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ12', 'login' => 'test12', 'email' => 'test12@testtest.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ13', 'login' => 'test13', 'email' => 'test13@testtest.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ14', 'login' => 'test14', 'email' => 'test14@testtest.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ15', 'login' => 'test15', 'email' => 'test15@testtest.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ16', 'login' => 'test16', 'email' => 'test16@testtest.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ17', 'login' => 'test17', 'email' => 'test17@testtest.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => false],),
            array_merge($user_template, ['name' => 'テストユーザ18', 'login' => 'test18', 'email' => 'test18@testtest.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => false],),
            array_merge($user_template, ['name' => 'テストユーザ19', 'login' => 'test19', 'email' => 'test19@testtest.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => false],),
            array_merge($user_template, ['name' => 'テストユーザ20', 'login' => 'test20', 'email' => 'test20@testtest.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => false],),
            array_merge($user_template, ['name' => 'テストユーザ21', 'login' => 'test20', 'email' => 'test21@testtest.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => false],),
            array_merge($user_template, ['name' => 'テストユーザ22', 'login' => 'test21', 'email' => 'test22@testtest.com', 'status' => UserStatus::REGISTERD, 'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ23', 'login' => 'test22', 'email' => 'test23@testtest.com', 'status' => UserStatus::REGISTERD, 'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ24', 'login' => 'test23', 'email' => 'test24@testtest.com', 'status' => UserStatus::REGISTERD, 'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ25', 'login' => 'test24', 'email' => 'test25@testtest.com', 'status' => UserStatus::REGISTERD, 'must_change_password' => false],),
            array_merge($user_template, ['name' => 'テストユーザ26', 'login' => 'test25', 'email' => 'test26@testtest.com', 'status' => UserStatus::REGISTERD, 'must_change_password' => false],),
            array_merge($user_template, ['name' => 'テストユーザ27', 'login' => 'test26', 'email' => 'test27@testtest.com', 'status' => UserStatus::LOCKED,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ28', 'login' => 'test27', 'email' => 'test28@testtest.com', 'status' => UserStatus::LOCKED,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ29', 'login' => 'test28', 'email' => 'test29@testtest.com', 'status' => UserStatus::LOCKED,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ30', 'login' => 'test29', 'email' => 'test30@testtest.com', 'status' => UserStatus::LOCKED,    'must_change_password' => false],),
            array_merge($user_template, ['name' => 'テストユーザ31', 'login' => 'test30', 'email' => 'test31@testtest.com', 'status' => UserStatus::LOCKED,    'must_change_password' => false],),
        ];
        foreach($users as $user)
        {
            User::updateOrCreate(
                ['login' => $user['login']],
                $user,
            );
            $_user = User::whereLogin($user['login'])->first();
            $_user->must_change_password = $user['must_change_password'];
            $_user->save();
        }
        // groups
        $group_template = ['type' => UserType::GROUP ];
        $groups = [
            array_merge($group_template, [ 'name' => 'テストグループ01' ],),
            array_merge($group_template, [ 'name' => 'テストグループ02' ],),
            array_merge($group_template, [ 'name' => 'テストグループ03' ],),
            array_merge($group_template, [ 'name' => 'テストグループ04' ],),
            array_merge($group_template, [ 'name' => 'テストグループ05' ],),
            array_merge($group_template, [ 'name' => 'テストグループ06' ],),
            array_merge($group_template, [ 'name' => 'テストグループ07' ],),
            array_merge($group_template, [ 'name' => 'テストグループ08' ],),
            array_merge($group_template, [ 'name' => 'テストグループ09' ],),
            array_merge($group_template, [ 'name' => 'テストグループ10' ],),
            array_merge($group_template, [ 'name' => 'テストグループ11' ],),
            array_merge($group_template, [ 'name' => 'テストグループ12' ],),
            array_merge($group_template, [ 'name' => 'テストグループ13' ],),
            array_merge($group_template, [ 'name' => 'テストグループ14' ],),
            array_merge($group_template, [ 'name' => 'テストグループ15' ],),
            array_merge($group_template, [ 'name' => 'テストグループ16' ],),
            array_merge($group_template, [ 'name' => 'テストグループ17' ],),
            array_merge($group_template, [ 'name' => 'テストグループ18' ],),
            array_merge($group_template, [ 'name' => 'テストグループ19' ],),
            array_merge($group_template, [ 'name' => 'テストグループ20' ],),
        ];
        foreach($groups as $group)
        {
            User::updateOrCreate(
                ['name' => $group['name'] ],
                $group
            );
        }
        // groups_users
        $groups_users = [
            [ 'group_id' => 'テストグループ01', 'user_id' => 'test01' ],
            [ 'group_id' => 'テストグループ01', 'user_id' => 'test02' ],
            [ 'group_id' => 'テストグループ01', 'user_id' => 'test03' ],
            [ 'group_id' => 'テストグループ01', 'user_id' => 'test04' ],
            [ 'group_id' => 'テストグループ01', 'user_id' => 'test05' ],
            [ 'group_id' => 'テストグループ02', 'user_id' => 'test11' ],
            [ 'group_id' => 'テストグループ02', 'user_id' => 'test12' ],
            [ 'group_id' => 'テストグループ02', 'user_id' => 'test13' ],
            [ 'group_id' => 'テストグループ02', 'user_id' => 'test14' ],
            [ 'group_id' => 'テストグループ02', 'user_id' => 'test15' ],
            [ 'group_id' => 'テストグループ03', 'user_id' => 'test01' ],
            [ 'group_id' => 'テストグループ03', 'user_id' => 'test02' ],
            [ 'group_id' => 'テストグループ03', 'user_id' => 'test03' ],
            [ 'group_id' => 'テストグループ03', 'user_id' => 'test04' ],
            [ 'group_id' => 'テストグループ03', 'user_id' => 'test05' ],
            [ 'group_id' => 'テストグループ03', 'user_id' => 'test11' ],
            [ 'group_id' => 'テストグループ04', 'user_id' => 'test12' ],
            [ 'group_id' => 'テストグループ04', 'user_id' => 'test13' ],
            [ 'group_id' => 'テストグループ04', 'user_id' => 'test14' ],
            [ 'group_id' => 'テストグループ04', 'user_id' => 'test15' ],
        ];
        foreach($groups_users as $group_user)
        {
            $group_id = User::whereName($group_user['group_id'])->first()->id;
            $user_id  = User::whereLogin($group_user['user_id'])->first()->id;
            DB::table('groups_users')->upsert(
                ['group_id' => $group_id, 'user_id' => $user_id],
                ['group_id' => $group_id, 'user_id' => $user_id],
                ['group_id' => $group_id, 'user_id' => $user_id],
            );
        }
        // projects
        $project_template = [];
        $projects = [
            array_merge($project_template, ['name' => 'プロジェクト01',     'identifer' => 'project01',     'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => null],),
            array_merge($project_template, ['name' => 'プロジェクト0101',   'identifer' => 'project0101',   'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => 'project01'],),
            array_merge($project_template, ['name' => 'プロジェクト010101', 'identifer' => 'project010101', 'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => 'project0101'],),
            array_merge($project_template, ['name' => 'プロジェクト010102', 'identifer' => 'project010102', 'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => 'project0101'],),
            array_merge($project_template, ['name' => 'プロジェクト0102',   'identifer' => 'project0102',   'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => 'project01'],),
            array_merge($project_template, ['name' => 'プロジェクト0103',   'identifer' => 'project0103',   'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => 'project01'],),
            array_merge($project_template, ['name' => 'プロジェクト010301', 'identifer' => 'project010301', 'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => 'project0103'],),
            array_merge($project_template, ['name' => 'プロジェクト010302', 'identifer' => 'project010302', 'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => 'project0103'],),
            array_merge($project_template, ['name' => 'プロジェクト0104',   'identifer' => 'project0103',   'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => 'project01'],),
            array_merge($project_template, ['name' => 'プロジェクト02',     'identifer' => 'project02',     'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => null],),
            array_merge($project_template, ['name' => 'プロジェクト0201',   'identifer' => 'project0201',   'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => 'project02'],),
            array_merge($project_template, ['name' => 'プロジェクト0202',   'identifer' => 'project0202',   'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => 'project02'],),
            array_merge($project_template, ['name' => 'プロジェクト020201', 'identifer' => 'project020201', 'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => 'project0202'],),
            array_merge($project_template, ['name' => 'プロジェクト020202', 'identifer' => 'project020202', 'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => 'project0202'],),
            array_merge($project_template, ['name' => 'プロジェクト020203', 'identifer' => 'project020203', 'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => 'project0202'],),
            array_merge($project_template, ['name' => 'プロジェクト03',     'identifer' => 'project03',     'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => null],),
            array_merge($project_template, ['name' => 'プロジェクト0301',   'identifer' => 'project0301',   'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => 'project03'],),
            array_merge($project_template, ['name' => 'プロジェクト0302',   'identifer' => 'project0302',   'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => 'project03'],),
            array_merge($project_template, ['name' => 'プロジェクト0304',   'identifer' => 'project0303',   'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => 'project03'],),
            array_merge($project_template, ['name' => 'プロジェクト0305',   'identifer' => 'project0304',   'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => 'project03'],),
            array_merge($project_template, ['name' => 'プロジェクト04',     'identifer' => 'project04',     'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => null],),
            array_merge($project_template, ['name' => 'プロジェクト05',     'identifer' => 'project05',     'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => null],),
            array_merge($project_template, ['name' => 'プロジェクト06',     'identifer' => 'project06',     'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => null],),
        ];
        foreach($projects as $project){
            if(!is_null($project["parent_identifer"])){
                $parent = Project::whereIdentifer($project["parent_identifer"])->first();
                if(!is_null($parent)){
                    $project["parent_id"] = $parent->id;
                }
            }
            unset($project['parent_identifer']);
            Project::updateOrCreate(
                ['identifer' => $project['identifer']],
                $project,
            );
        }
    }
}
