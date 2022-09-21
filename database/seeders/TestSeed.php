<?php

namespace Database\Seeders;

use App\Enums\ProjectStatus;
use App\Enums\UserStatus;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TestSeed extends Seeder
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
        $users = [
            ['name' => 'テストユーザ01', 'login' => 'hoge01', 'email' => 'hoge01@hogehoge.com', 'password' => $password, 'status' => UserStatus::ACTIVE,    'must_change_password' => true],
            ['name' => 'テストユーザ02', 'login' => 'hoge02', 'email' => 'hoge02@hogehoge.com', 'password' => $password, 'status' => UserStatus::ACTIVE,    'must_change_password' => true],
            ['name' => 'テストユーザ03', 'login' => 'hoge03', 'email' => 'hoge03@hogehoge.com', 'password' => $password, 'status' => UserStatus::ACTIVE,    'must_change_password' => true],
            ['name' => 'テストユーザ04', 'login' => 'hoge04', 'email' => 'hoge04@hogehoge.com', 'password' => $password, 'status' => UserStatus::ACTIVE,    'must_change_password' => true],
            ['name' => 'テストユーザ05', 'login' => 'hoge05', 'email' => 'hoge05@hogehoge.com', 'password' => $password, 'status' => UserStatus::ACTIVE,    'must_change_password' => true],
            ['name' => 'テストユーザ06', 'login' => 'hoge06', 'email' => 'hoge06@hogehoge.com', 'password' => $password, 'status' => UserStatus::ACTIVE,    'must_change_password' => true],
            ['name' => 'テストユーザ07', 'login' => 'hoge07', 'email' => 'hoge07@hogehoge.com', 'password' => $password, 'status' => UserStatus::ACTIVE,    'must_change_password' => true],
            ['name' => 'テストユーザ08', 'login' => 'hoge08', 'email' => 'hoge08@hogehoge.com', 'password' => $password, 'status' => UserStatus::ACTIVE,    'must_change_password' => true],
            ['name' => 'テストユーザ09', 'login' => 'hoge09', 'email' => 'hoge09@hogehoge.com', 'password' => $password, 'status' => UserStatus::ACTIVE,    'must_change_password' => true],
            ['name' => 'テストユーザ10', 'login' => 'hoge10', 'email' => 'hoge10@hogehoge.com', 'password' => $password, 'status' => UserStatus::ACTIVE,    'must_change_password' => true],
            ['name' => 'テストユーザ11', 'login' => 'hoge11', 'email' => 'hoge11@hogehoge.com', 'password' => $password, 'status' => UserStatus::ACTIVE,    'must_change_password' => true],
            ['name' => 'テストユーザ12', 'login' => 'hoge12', 'email' => 'hoge12@hogehoge.com', 'password' => $password, 'status' => UserStatus::ACTIVE,    'must_change_password' => true],
            ['name' => 'テストユーザ13', 'login' => 'hoge13', 'email' => 'hoge13@hogehoge.com', 'password' => $password, 'status' => UserStatus::ACTIVE,    'must_change_password' => true],
            ['name' => 'テストユーザ14', 'login' => 'hoge14', 'email' => 'hoge14@hogehoge.com', 'password' => $password, 'status' => UserStatus::ACTIVE,    'must_change_password' => true],
            ['name' => 'テストユーザ15', 'login' => 'hoge15', 'email' => 'hoge15@hogehoge.com', 'password' => $password, 'status' => UserStatus::ACTIVE,    'must_change_password' => true],
            ['name' => 'テストユーザ16', 'login' => 'hoge16', 'email' => 'hoge16@hogehoge.com', 'password' => $password, 'status' => UserStatus::ACTIVE,    'must_change_password' => true],
            ['name' => 'テストユーザ17', 'login' => 'hoge17', 'email' => 'hoge17@hogehoge.com', 'password' => $password, 'status' => UserStatus::ACTIVE,    'must_change_password' => false],
            ['name' => 'テストユーザ18', 'login' => 'hoge18', 'email' => 'hoge18@hogehoge.com', 'password' => $password, 'status' => UserStatus::ACTIVE,    'must_change_password' => false],
            ['name' => 'テストユーザ19', 'login' => 'hoge19', 'email' => 'hoge19@hogehoge.com', 'password' => $password, 'status' => UserStatus::ACTIVE,    'must_change_password' => false],
            ['name' => 'テストユーザ20', 'login' => 'hoge20', 'email' => 'hoge20@hogehoge.com', 'password' => $password, 'status' => UserStatus::ACTIVE,    'must_change_password' => false],
            ['name' => 'テストユーザ21', 'login' => 'hoge20', 'email' => 'hoge21@hogehoge.com', 'password' => $password, 'status' => UserStatus::ACTIVE,    'must_change_password' => false],
            ['name' => 'テストユーザ22', 'login' => 'hoge21', 'email' => 'hoge22@hogehoge.com', 'password' => $password, 'status' => UserStatus::REGISTERD, 'must_change_password' => true],
            ['name' => 'テストユーザ23', 'login' => 'hoge22', 'email' => 'hoge23@hogehoge.com', 'password' => $password, 'status' => UserStatus::REGISTERD, 'must_change_password' => true],
            ['name' => 'テストユーザ24', 'login' => 'hoge23', 'email' => 'hoge24@hogehoge.com', 'password' => $password, 'status' => UserStatus::REGISTERD, 'must_change_password' => true],
            ['name' => 'テストユーザ25', 'login' => 'hoge24', 'email' => 'hoge25@hogehoge.com', 'password' => $password, 'status' => UserStatus::REGISTERD, 'must_change_password' => false],
            ['name' => 'テストユーザ26', 'login' => 'hoge25', 'email' => 'hoge26@hogehoge.com', 'password' => $password, 'status' => UserStatus::REGISTERD, 'must_change_password' => false],
            ['name' => 'テストユーザ27', 'login' => 'hoge26', 'email' => 'hoge27@hogehoge.com', 'password' => $password, 'status' => UserStatus::LOCKED,    'must_change_password' => true],
            ['name' => 'テストユーザ28', 'login' => 'hoge27', 'email' => 'hoge28@hogehoge.com', 'password' => $password, 'status' => UserStatus::LOCKED,    'must_change_password' => true],
            ['name' => 'テストユーザ29', 'login' => 'hoge28', 'email' => 'hoge29@hogehoge.com', 'password' => $password, 'status' => UserStatus::LOCKED,    'must_change_password' => true],
            ['name' => 'テストユーザ30', 'login' => 'hoge29', 'email' => 'hoge30@hogehoge.com', 'password' => $password, 'status' => UserStatus::LOCKED,    'must_change_password' => false],
            ['name' => 'テストユーザ31', 'login' => 'hoge30', 'email' => 'hoge31@hogehoge.com', 'password' => $password, 'status' => UserStatus::LOCKED,    'must_change_password' => false],
        ];
        foreach($users as $user)
        {
            User::updateOrCreate(
                ['login' => $user['login']],
                $user,
            );
            $_user = User::where('login', $user['login'])->first();
            $_user->must_change_password = $user['must_change_password'];
            $_user->save();
        }
        // projects
        $projects = [
            ['name' => 'プロジェクト01',     'identifer' => 'project01',     'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => null],
            ['name' => 'プロジェクト0101',   'identifer' => 'project0101',   'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => 'project01'],
            ['name' => 'プロジェクト010101', 'identifer' => 'project010101', 'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => 'project0101'],
            ['name' => 'プロジェクト010102', 'identifer' => 'project010102', 'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => 'project0101'],
            ['name' => 'プロジェクト0102',   'identifer' => 'project0102',   'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => 'project01'],
            ['name' => 'プロジェクト0103',   'identifer' => 'project0103',   'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => 'project01'],
            ['name' => 'プロジェクト010301', 'identifer' => 'project010301', 'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => 'project0103'],
            ['name' => 'プロジェクト010302', 'identifer' => 'project010302', 'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => 'project0103'],
            ['name' => 'プロジェクト0104',   'identifer' => 'project0103',   'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => 'project01'],
            ['name' => 'プロジェクト02',     'identifer' => 'project02',     'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => null],
            ['name' => 'プロジェクト0201',   'identifer' => 'project0201',   'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => 'project02'],
            ['name' => 'プロジェクト0202',   'identifer' => 'project0202',   'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => 'project02'],
            ['name' => 'プロジェクト020201', 'identifer' => 'project020201', 'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => 'project0202'],
            ['name' => 'プロジェクト020202', 'identifer' => 'project020202', 'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => 'project0202'],
            ['name' => 'プロジェクト020203', 'identifer' => 'project020203', 'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => 'project0202'],
            ['name' => 'プロジェクト03',     'identifer' => 'project03',     'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => null],
            ['name' => 'プロジェクト0301',   'identifer' => 'project0301',   'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => 'project03'],
            ['name' => 'プロジェクト0302',   'identifer' => 'project0302',   'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => 'project03'],
            ['name' => 'プロジェクト0304',   'identifer' => 'project0303',   'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => 'project03'],
            ['name' => 'プロジェクト0305',   'identifer' => 'project0304',   'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => 'project03'],
            ['name' => 'プロジェクト04',     'identifer' => 'project04',     'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => null],
            ['name' => 'プロジェクト05',     'identifer' => 'project05',     'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => null],
            ['name' => 'プロジェクト06',     'identifer' => 'project06',     'description' => null, 'status'=> ProjectStatus::ACTIVE, 'parent_id' => null, 'parent_identifer' => null],
        ];
        foreach($projects as $project){
            if(!is_null($project["parent_identifer"])){
                $parent = Project::where("identifer", $project["parent_identifer"])->first();
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
