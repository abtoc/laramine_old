<?php

namespace Database\Seeders;

use App\Enums\UserStatus;
use App\Enums\UserType;
use App\Models\User;
use App\Models\EmailAddress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(
            ['login' => 'admin'],
            [
                'type' => UserType::USER,
                'name' => __('Administrator'),
                'email' => 'admin@example.net',
                'password' => Hash::make('admin'),
                'admin' => true,
                'status' => UserStatus::ACTIVE,
                'must_change_password' => true,
            ]
        );

        User::updateOrCreate(
            ['login' => UserType::GROUP_ANONYMOUS->name],
            [
                'type' => UserType::GROUP_ANONYMOUS,
                'name' => UserType::GROUP_ANONYMOUS->string(),
                'email' => UserType::GROUP_ANONYMOUS->name,
                'password' => Hash::make(UserType::GROUP_ANONYMOUS->name),
                'admin' => false,
                'status' => UserStatus::ACTIVE,
                'must_change_password' => false,
            ]
        );

        User::updateOrCreate(
            ['login' => UserType::GROUP_NON_MEMBER->name],
            [
                'type' => UserType::GROUP_NON_MEMBER,
                'name' => UserType::GROUP_NON_MEMBER->string(),
                'email' => UserType::GROUP_NON_MEMBER->name,
                'password' => Hash::make(UserType::GROUP_NON_MEMBER->name),
                'admin' => false,
                'status' => UserStatus::ACTIVE,
                'must_change_password' => false,
            ]
        );
        User::updateOrCreate(
            ['login' => UserType::ANONYMOUS_USER->name],
            [
                'type' => UserType::ANONYMOUS_USER,
                'name' => UserType::ANONYMOUS_USER->string(),
                'email' => UserType::ANONYMOUS_USER->name,
                'password' => Hash::make(UserType::ANONYMOUS_USER->name),
                'admin' => false,
                'status' => UserStatus::LOCKED,
                'must_change_password' => false,
            ]
        );
    }
}
