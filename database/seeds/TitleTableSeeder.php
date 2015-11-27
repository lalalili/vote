<?php

use Illuminate\Database\Seeder;
use App\Models\Title;

class TitleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('titles')->truncate();

        $titles = [
            [
                'name' => '銷售經理',
            ],
            [
                'name' => '銷售副理'
            ],
            [
                'name' => '銷售顧問'
            ],
            [
                'name' => '銷售主任'
            ],
            [
                'name' => '服務廠長'
            ],
            [
                'name' => '行政組長'
            ],
            [
                'name' => '服務專員'
            ],
            [
                'name' => '行政專員'
            ],
            [
                'name' => '零件專員'
            ],
            [
                'name' => '引擎組長'
            ],
            [
                'name' => '技師'
            ]
        ];

        foreach ($titles as $title) {
            Title::create($title);
        }
    }
}
