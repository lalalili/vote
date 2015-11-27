<?php

use App\Year;
use Illuminate\Database\Seeder;

class YearTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('years')->truncate();

        $years = [
            [
                'name' => '2009',
            ],
            [
                'name' => '2010'
            ],
            [
                'name' => '2011'
            ],
            [
                'name' => '2012'
            ],
            [
                'name' => '2013'
            ],
            [
                'name' => '2014'
            ],
            [
                'name' => '2015'
            ],
            [
                'name' => '2016'
            ]
        ];

        foreach ($years as $year) {
            Year::create($year);
        }
    }
}
