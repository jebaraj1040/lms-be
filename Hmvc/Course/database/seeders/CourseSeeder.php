<?php

namespace Hmvc\Course\Database\Seeders;

use Illuminate\Database\Seeder;
use Hmvc\Course\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::factory()->count(32)->create();
    }
}
