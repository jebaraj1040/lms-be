<?php

namespace Hmvc\Course\Database\Seeders;

use Hmvc\Course\Models\CourseSubscription;
use Illuminate\Database\Seeder;

class SeedFakeCourseSubcriptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CourseSubscription::factory()->count(32)->create();
    }
}
