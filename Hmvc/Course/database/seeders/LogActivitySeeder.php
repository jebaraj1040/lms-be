<?php

namespace Hmvc\Course\Database\Seeders;

use Illuminate\Database\Seeder;
use Hmvc\Course\Models\LogActivity;

class LogActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LogActivity::factory()->count(200)->create();
    }
}
