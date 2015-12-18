<?php

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->truncate();

        $projects = [
            [
                'name' => '2016 CS 訓練',
            ]
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
