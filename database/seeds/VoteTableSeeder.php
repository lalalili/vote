<?php

use App\Models\Vote;
use Illuminate\Database\Seeder;

class VoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('votes')->truncate();

        for ($i = 0; $i < 10; $i++) {
            Vote::create([
                'name' => '客戶 ' . $i,
                'phone' => '091234567' . $i,
                'q1' => rand(0, 1),
                'q2' => rand(0, 1),
                'q3' => rand(0, 1),
                'photo_id' => rand(1, 6),
            ]);

        }
    }
}