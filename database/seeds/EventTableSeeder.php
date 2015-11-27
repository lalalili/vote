<?php

use Illuminate\Database\Seeder;
use App\Event;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->truncate();

        $events = [
            [
                'name' => '北區 2016/5/5 集思會議中心',
            ],
            [
                'name' => '中區 2016/5/27 台中南山人壽'
            ],
            [
                'name' => '南區 2016/5/28 蓮池會館'
            ]
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
