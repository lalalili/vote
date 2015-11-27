<?php

use App\Group;
use Illuminate\Database\Seeder;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->truncate();

        $groups = [
            [
                'name' => '1',
            ],
            [
                'name' => '2'
            ],
            [
                'name' => '3'
            ],
            [
                'name' => '4'
            ]
        ];

        foreach ($groups as $group) {
            Group::create($group);
        }
    }
}
