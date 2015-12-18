<?php

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->truncate();

        $courses = [
            [
                'name' => '2016 銷售新進菁英(161~164期) 1',
                'project_id' => '1',
            ],
            [
                'name' => '2016 銷售新進菁英(161~164期) 2',
                'project_id' => '1',
            ],
            [
                'name' => '2016 銷售新進菁英(161~164期) 3',
                'project_id' => '1',
            ],
            [
                'name' => '2016 銷售新進菁英(161~164期) 4',
                'project_id' => '1',
            ],
            [
                'name' => '2016 銷售新進菁英(161~164期) 5',
                'project_id' => '1',
            ],
            [
                'name' => '2016 銷售基礎培訓(141~154期)',
                'project_id' => '1',
            ],
            [
                'name' => '2016 銷售進階培訓(121~134期)',
                'project_id' => '1',
            ],
            [
                'name' => '2016 銷售 CS 論壇 (091~114期)',
                'project_id' => '1',
            ],
            [
                'name' => '2016 服務專員新進菁英(161~164期)',
                'project_id' => '1',
            ],
            [
                'name' => '2016 服務專員基礎培訓(141~154期)',
                'project_id' => '1',
            ],
            [
                'name' => '2016 服務專員進階培訓(121~134期)',
                'project_id' => '1',
            ],
            [
                'name' => '2016 服務專員 CS 論壇 (091~114期)',
                'project_id' => '1',
            ],
            [
                'name' => '2016 行政專員課程 (091~164期)',
                'project_id' => '1',
            ]

        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}
