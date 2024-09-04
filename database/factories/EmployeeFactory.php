<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        DB::table('lms_employees');
        return [
            'name' => fake()->name(),
            'code' => 'CRI'.str_pad($this->faker->unique()->numberBetween(1, 9999), 4, '0', STR_PAD_LEFT),
            'email' => fake()->unique()->safeEmail(),
            'contact_no' => $this->faker->numerify('##########'),
            'designation' => fake()->randomElement(['HR', 'BA', 'Senior Software Engineer', 'Software Engineer', 'Senior Software Tester', 'Software Tester', 'Team Lead']),
            'skills' => fake()->randomElement(['Frontend Developer', 'Backend Developer', 'Fullstack Developer']),
            'total_experience' => 10,
            'date_of_birth'=>Carbon::now()->subDays(rand(0, 365))->setTime(rand(0, 23), rand(0, 59), rand(0, 59)),
            'relevant_experience' => 10,
            'current_ctc' => rand(0, 10000),
            'expected_ctc' => 9000000,
            'last_reason_resignation' => fake()->randomElement(['Career Growth', 'Salary Problem', 'Health Issue', 'Personal Reason']),
            'location' => fake()->randomElement(['Chennai', 'Madurai', 'Selam', 'Trichy', 'Karur', 'Kanyakumari', 'Nagarkovil', 'Erode', 'Namakal', 'Sivakasi', 'Sivagankai']),
            'notice_period' => '10 days',
            'image' => fake()->imageUrl(),
            'cri_past_six_month' => fake()->randomElement(['Career Growth', 'Salary Problem', 'Health Issue', 'Personal Reason']),
            'acquaintances_in_cri' => fake()->randomElement(['No one', 'TL', 'Manager', 'HR']),
            'family_backgroud' => json_encode([fake()->randomElement(['Middel class'])]),
            'status' => 1,
            'role_id' => 4,
            'created_by' => 1,
        ];
    }
}
