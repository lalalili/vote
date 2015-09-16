<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('users')->truncate();

        $admin = [
            'name' => 'admin',
            'email' => 'admincat',
            'password' => bcrypt('gearbolt9')
        ];
        $user1 = User::create($admin);
        $user1->roles()->sync([1]);

        $owner = [
            'name' => 'owner',
            'email' => 'ownercat',
            'password' => bcrypt('gearbolt9')
         ];
        $user2 = User::create($owner);
        $user2->roles()->sync([2]);

        $owner = [
            'name' => 'LA',
            'email' => 'LA',
            'password' => bcrypt('LA')
        ];
        $user3 = User::create($owner);
        $user3->roles()->sync([2]);


        $owner = [
            'name' => 'LB',
            'email' => 'LB',
            'password' => bcrypt('LB')
        ];
        $user4 = User::create($owner);
        $user4->roles()->sync([2]);

        $owner = [
            'name' => 'LC',
            'email' => 'LC',
            'password' => bcrypt('LC')
        ];
        $user5 = User::create($owner);
        $user5->roles()->sync([2]);

        $owner = [
            'name' => 'LD',
            'email' => 'LD',
            'password' => bcrypt('LD')
        ];
        $user6 = User::create($owner);
        $user6->roles()->sync([2]);

        $owner = [
            'name' => 'LE',
            'email' => 'LE',
            'password' => bcrypt('LE')
        ];
        $user7 = User::create($owner);
        $user7->roles()->sync([2]);
    }
}