<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Membuat Role Admin
        $adminRole = new Role();
        $adminRole->name = "admin";
        $adminRole->display_name = "Admin";
        $adminRole->save();

        //Membuat Role Member
        $bengkelRole = new Role();
        $bengkelRole->name = "bengkel";
        $bengkelRole->display_name = "Bengkel";
        $bengkelRole->save();

        $labRole = new Role();
        $labRole->name = "lab";
        $labRole->display_name = "Lab";
        $labRole->save();

        //Membuat Sample Admin
        $admin = new User();
        $admin->name = 'Admin Utama';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('rahasia');
        $admin->save();
        $admin->attachRole($adminRole);

         //Membuat Sample Member
        $bengkel = new User();
        $bengkel->name = 'Sample Bengkel';
        $bengkel->email = 'bengkel@gmail.com';
        $bengkel->password = bcrypt('rahasia');
        $bengkel->save();
        $bengkel->attachRole($bengkelRole);

        $lab = new User();
        $lab->name = 'Sample Lab';
        $lab->email = 'lab@gmail.com';
        $lab->password = bcrypt('rahasia');
        $lab->save();
        $lab->attachRole($labRole);

    }
}
