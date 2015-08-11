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

        $titles = [[
            'name' => '銷售經理',
        ], [
            'name' => '銷售副理'
        ], [
            'name' => '銷售顧問'
        ], [
            'name' => '銷售主任'
        ], [
            'name' => '廠長'
        ]];

        foreach ($titles as $title) {
            Title::create($title);
        }
    }
}