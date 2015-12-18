<?php

use Illuminate\Database\Seeder;
use App\Models\Event;

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
                'name'      => '2016/5/5 集思會議中心',
                'area'      => '北區',
                'course_id' => '1',
                'number'    => '30',
                'event_at'  => '2016/5/5 08:00:00',
            ],
            [
                'name'      => '2016/5/27 台中南山人壽',
                'area'      => '中區',
                'course_id' => '1',
                'number'    => '20',
                'event_at'  => '2016/5/27 08:00:00',
            ],
            [
                'name'      => '2016/5/28 蓮池會館',
                'area'      => '南區',
                'course_id' => '1',
                'number'    => '40',
                'event_at'  => '2016/5/28 08:00:00',
            ]
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
