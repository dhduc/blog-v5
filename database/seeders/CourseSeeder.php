<?php

namespace Database\Seeders;

use App\Models\Chapter;
use App\Models\Lesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chapters = [
            [
                'title' => '',
                'desc' => '',
            ]
        ];
        $lessons = [
            [
                'title' => '',
                'desc' => '',
            ]
        ];

        Chapter::insert($chapters);
        Lesson::insert($lessons);
    }
}
