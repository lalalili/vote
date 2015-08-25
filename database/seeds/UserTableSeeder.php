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
            'email' => 'lalalili@gmail.com',
            'password' => bcrypt('admin156*')
        ];
        $user1 = User::create($admin);
        $user1->roles()->sync([1]);

        $owner = [
            'name' => 'owner',
            'email' => 'james@jeslead.com',
            'password' => bcrypt('admin156*')
         ];
        $user2 = User::create($owner);
        $user2->roles()->sync([2]);
    }
}