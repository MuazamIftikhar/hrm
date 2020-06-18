<?php

use Illuminate\Database\Seeder;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=new \App\User();
        $user->name="Muazam";
        $user->lastName="Iftikhar";
        $user->phone="03230471256";
        $user->email="admin@gmail.com";
        $user->password=Hash::make("1234567");
        $user->save();
        $owner = new \App\Role();
        $owner->name         = 'Super Admin';
        $owner->display_name = 'Super Admin'; // optional
        $owner->description  = 'User is the owner of a given project'; // optional
        $owner->save();
        $user->attachRole($owner); // parameter can be an Role object, array, or id
        $staff = new \App\Role();
        $staff->name         = 'Staff';
        $staff->display_name = 'Staff';
        $staff->description  = 'User is the Staff of a given project';
        $staff->save();
        $admin = new \App\Role();
        $admin->name         = 'User Admin';
        $admin->display_name = 'User Admin';
        $admin->description  = 'User is the User Admin of a given project';
        $admin->save();
        $user = new \App\Role();
        $user->name         = 'User';
        $user->display_name = 'User';
        $user->description  = 'User is the User of a given project';
        $user->save();
    }
}
