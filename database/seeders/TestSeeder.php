<?php

namespace Database\Seeders;

use App\Enums\ProjectStatus;
use App\Enums\UserType;
use App\Enums\UserStatus;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
            array_merge($user_template, ['name' => 'テストユーザ01', 'login' => 'hoge01', 'email' => 'hoge01@hogehoge.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ02', 'login' => 'hoge02', 'email' => 'hoge02@hogehoge.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ03', 'login' => 'hoge03', 'email' => 'hoge03@hogehoge.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ04', 'login' => 'hoge04', 'email' => 'hoge04@hogehoge.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ05', 'login' => 'hoge05', 'email' => 'hoge05@hogehoge.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ06', 'login' => 'hoge06', 'email' => 'hoge06@hogehoge.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ07', 'login' => 'hoge07', 'email' => 'hoge07@hogehoge.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ08', 'login' => 'hoge08', 'email' => 'hoge08@hogehoge.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ09', 'login' => 'hoge09', 'email' => 'hoge09@hogehoge.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ10', 'login' => 'hoge10', 'email' => 'hoge10@hogehoge.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ11', 'login' => 'hoge11', 'email' => 'hoge11@hogehoge.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ12', 'login' => 'hoge12', 'email' => 'hoge12@hogehoge.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ13', 'login' => 'hoge13', 'email' => 'hoge13@hogehoge.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ14', 'login' => 'hoge14', 'email' => 'hoge14@hogehoge.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ15', 'login' => 'hoge15', 'email' => 'hoge15@hogehoge.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ16', 'login' => 'hoge16', 'email' => 'hoge16@hogehoge.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ17', 'login' => 'hoge17', 'email' => 'hoge17@hogehoge.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => false],),
            array_merge($user_template, ['name' => 'テストユーザ18', 'login' => 'hoge18', 'email' => 'hoge18@hogehoge.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => false],),
            array_merge($user_template, ['name' => 'テストユーザ19', 'login' => 'hoge19', 'email' => 'hoge19@hogehoge.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => false],),
            array_merge($user_template, ['name' => 'テストユーザ20', 'login' => 'hoge20', 'email' => 'hoge20@hogehoge.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => false],),
            array_merge($user_template, ['name' => 'テストユーザ21', 'login' => 'hoge20', 'email' => 'hoge21@hogehoge.com', 'status' => UserStatus::ACTIVE,    'must_change_password' => false],),
            array_merge($user_template, ['name' => 'テストユーザ22', 'login' => 'hoge21', 'email' => 'hoge22@hogehoge.com', 'status' => UserStatus::REGISTERD, 'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ23', 'login' => 'hoge22', 'email' => 'hoge23@hogehoge.com', 'status' => UserStatus::REGISTERD, 'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ24', 'login' => 'hoge23', 'email' => 'hoge24@hogehoge.com', 'status' => UserStatus::REGISTERD, 'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ25', 'login' => 'hoge24', 'email' => 'hoge25@hogehoge.com', 'status' => UserStatus::REGISTERD, 'must_change_password' => false],),
            array_merge($user_template, ['name' => 'テストユーザ26', 'login' => 'hoge25', 'email' => 'hoge26@hogehoge.com', 'status' => UserStatus::REGISTERD, 'must_change_password' => false],),
            array_merge($user_template, ['name' => 'テストユーザ27', 'login' => 'hoge26', 'email' => 'hoge27@hogehoge.com', 'status' => UserStatus::LOCKED,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ28', 'login' => 'hoge27', 'email' => 'hoge28@hogehoge.com', 'status' => UserStatus::LOCKED,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ29', 'login' => 'hoge28', 'email' => 'hoge29@hogehoge.com', 'status' => UserStatus::LOCKED,    'must_change_password' => true],),
            array_merge($user_template, ['name' => 'テストユーザ30', 'login' => 'hoge29', 'email' => 'hoge30@hogehoge.com', 'status' => UserStatus::LOCKED,    'must_change_password' => false],),
            array_merge($user_template, ['name' => 'テストユーザ31', 'login' => 'hoge30', 'email' => 'hoge31@hogehoge.com', 'status' => UserStatus::LOCKED,    'must_change_password' => false],),
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
