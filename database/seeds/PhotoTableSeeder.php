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

        for ($i = 0; $i < 100; $i++) {
            Photo::create([
                'name' => '員工'.$i,
                'path' => 'user'.rand(1, 6).'.png',
                'album_id' => rand(2, 71),
                'title_id' => rand(1, 11)
            ]);
        }

        $photos = [[
            'name' => '葉瑋豪',
            'path' => 'user8.png',
            'album_id' => 1,
            'title_id' => 1
        ], [
            'name' => '蘇游育銘',
            'path' => 'user7.png',
            'album_id' => 1,
            'title_id' => 5
        ]];

        foreach ($photos as $photo) {
            Photo::create($photo);
        }
    }
}
