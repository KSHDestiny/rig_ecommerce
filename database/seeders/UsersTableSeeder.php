<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1           = new User();
        $user1->name     = 'Admin User';
        $user1->email    = 'admin@gmail.com';
        $user1->password = Hash::make('password');
        $user1->role     = 'admin';
        $user1->save();

        $user2           = new User();
        $user2->name     = 'Mg Mg';
        $user2->email    = 'mgmg@gmail.com';
        $user2->password = Hash::make('password');
        $user2->role     = 'admin';
        $user2->save();

        $user3           = new User();
        $user3->name     = 'User';
        $user3->email    = 'user@gmail.com';
        $user3->password = Hash::make('password');
        $user3->role     = 'user';
        $user3->save();

        $user4           = new User();
        $user4->name     = 'Mo Mo';
        $user4->email    = 'momo@gmail.com';
        $user4->password = Hash::make('password');
        $user4->role     = 'user';
        $user4->save();
    }
}
