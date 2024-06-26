<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
//        $user = new User();
//        $user->name = 'Admin2 Doe';
//        $user->email = 'admin2@doe.com';
//        $user->password = bcrypt('password');
//        $user->assignRole('admin');
//        $user->save();
//
//        $user = new User();
//        $user->name = 'Client2 Doe';
//        $user->email = 'client2@doe.com';
//        $user->password = bcrypt('password');
//        $user->assignRole('client');
//        $user->save();
//        $this->createAdmin();
        $this->createUser();
        $this->createLawyer();

    }

    private function createLawyer()
    {
        $user = new User();
        $user->name = 'Lawyer2 Doe';
        $user->email = 'lawyer@doe.com';
        $user->password = bcrypt('password');
        $user->assignRole('lawyer');
        $user->save();
    }

    private function createUser()
    {
        $user = new User();
        $user->name = 'User2 Doe';
        $user->email = 'user2@doe.com';
        $user->password = bcrypt('password');
        $user->assignRole('client');
        $user->save();
    }

    private function createAdmin()
    {
        $user = new User();
        $user->name = 'Admin2 Doe';
        $user->email = 'admin2@doe.com';
        $user->password = bcrypt('password');
        $user->assignRole('admin');
        $user->save();
    }
}
