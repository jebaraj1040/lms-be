<?php

namespace Hmvc\Department\Database\Seeders;

use Hmvc\Department\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::factory()->count(12)->create();
    }
}
