<?php

namespace Database\Seeders;

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
                'name' => 'Administrator',
                'email' => 'admin@example.net',
                'password' => Hash::make('admin'),
                'admin' => true,
                'must_change_passwd' => true,
            ]
        );
        $user = User::where('login', 'admin')->first();
    }
}
