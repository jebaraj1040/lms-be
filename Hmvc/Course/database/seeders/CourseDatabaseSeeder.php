<?php

namespace Hmvc\Course\Database\Seeders;

use Hmvc\Course\Models\Course;
use Illuminate\Database\Seeder;

class CourseDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::factory()->count(32)->create();
    }
}
