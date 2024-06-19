<?php

namespace Database\Seeders;

use App\Models\Lawyer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class StartingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = new Role();
        $role->name = 'admin';
        $role->save();

        $role = new Role();
        $role->name = 'client';
        $role->save();

        $role = new Role();
        $role->name = 'lawyer';
        $role->save();

        $this->createAdmins();
        $this->createLawyers();


    }

    public function createAdmins(){
        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@doe.com';
        $admin->password = bcrypt('password');
        $admin->assignRole('admin');
        $admin->save();

    }

    public function createLawyers()
    {
        $lawyer = new User();
        $lawyer->name = 'Lawyer';
        $lawyer->email = 'lawyer@doe.com';
        $lawyer->password = bcrypt('password');
        $lawyer->assignRole('lawyer');
        $lawyer->save();

        $realLawyer = new Lawyer();
        $realLawyer->user_id = $lawyer->id;
        $realLawyer->save();
    }
}
