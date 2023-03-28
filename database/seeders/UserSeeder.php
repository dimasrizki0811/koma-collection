<?php

namespace Database\Seeders;

use App\Models\User;
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
        $user = new User;
        $user->name = "ADMIN";
        $user->username = "adminkoma";
        $user->email = "collectionkoma@gmail.com";
        $user->level = "admin";
        $user->avatar = "user.png";
        $user->password = Hash::make('adminkoma');
        $user->save();
    }
}