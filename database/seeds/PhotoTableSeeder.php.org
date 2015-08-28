<?php

use Illuminate\Database\Seeder;
use App\Models\Photo;


class PhotoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('photos')->truncate();

        $photos = [[
            'name' => '大熊',
            'path' => 'user1.png',
            'album_id' => 1,
            'title_id' => 1
        ], [
            'name' => '小叮噹',
            'path' => 'user2.png',
            'album_id' => 1,
            'title_id' => 5
        ], [
            'name' => '陸雅寧',
            'path' => 'user3.png',
            'album_id' => 1,
            'title_id' => 3
        ], [
            'name' => '帥哥甲',
            'path' => 'user4.png',
            'album_id' => 1,
            'title_id' => 4
        ], [
            'name' => '王聰明',
            'path' => 'user5.png',
            'album_id' => 2,
            'title_id' => 5
        ], [
            'name' => '宜靜',
            'path' => 'user6.png',
            'album_id' => 32,
            'title_id' => 6
        ]];

        foreach ($photos as $photo){
            Photo::create($photo);
        }
    }
}