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
                'name'     => '員工' . $i,
                'path'     => 'user' . rand(1, 6) . '.png',
                'album_id' => rand(2, 71),
                'title_id' => rand(1, 11)
            ]);
        }

        $photos = [
            [
                'name'     => '員工A',
                'path'     => 'user8.png',
                'album_id' => 1,
                'title_id' => 1
            ],
            [
                'name'     => '員工B',
                'path'     => 'user7.png',
                'album_id' => 1,
                'title_id' => 2
            ],
            [
                'name'     => '員工A',
                'path'     => 'user8.png',
                'album_id' => 2,
                'title_id' => 1
            ],
            [
                'name'     => '員工B',
                'path'     => 'user7.png',
                'album_id' => 2,
                'title_id' => 2
            ],
            [
                'name'     => '員工C',
                'path'     => 'user1.png',
                'album_id' => 2,
                'title_id' => 3
            ],
            [
                'name'     => '員工D',
                'path'     => 'user2.png',
                'album_id' => 2,
                'title_id' => 4
            ],
            [
                'name'     => '員工E',
                'path'     => 'user3.png',
                'album_id' => 2,
                'title_id' => 5
            ]
        ];

        foreach ($photos as $photo) {
            Photo::create($photo);
        }
    }
}
