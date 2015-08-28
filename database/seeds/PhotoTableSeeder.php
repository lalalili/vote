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
                'name' => '員工_'.$i,
                'path' => 'user'.rand(1,6).'.png',
                'album_id' => rand(1,71),
                'title_id' => rand(1,11)
            ]);
        }
    }
}