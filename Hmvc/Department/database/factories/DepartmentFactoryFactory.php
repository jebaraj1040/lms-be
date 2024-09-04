<?php

namespace Hmvc\Department\Database\Factories;

use App\Models\User;
use Hmvc\Department\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class DepartmentFactoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Department::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        DB::table('departments')->truncate();

        $status = rand(0, 1);
        $company_id = rand(1, 5);

        return [
            'name' => fake()->unique()->randomElement(['Quality Analyst',
                'Human Resource',
                'Software Development',
                'Business Analyst',
                'UI/UX', 'Marketing',
                'Tele Calling',
                'Networking',
                'Office Admin', 'Medical', 'Billing', 'Accounting']),
            'company_id' => $company_id,
            'status' => $status,
            'created_by' => User::where('name', '=', 'Super Admin')->first()->id
        ];
    }
}
