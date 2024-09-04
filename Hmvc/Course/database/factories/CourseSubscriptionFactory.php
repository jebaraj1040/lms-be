<?php

namespace Hmvc\Course\Database\Factories;

use App\Models\User;
use Hmvc\Course\Models\CourseSubscription;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CourseSubscriptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = CourseSubscription::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        DB::table('course_subscriptions')->truncate();
        $hrsSpent = rand(1, 100);
        $course_id = rand(1, 10);
        $department_id = rand(1, 10);
        $status = rand(1, 3);
        $certificateIssuedDate = Carbon::now()->subDays(rand(0, 365))->setTime(rand(0, 23), rand(0, 59), rand(0, 59));
        $startDate = Carbon::now()->subDays(rand(0, 365))->setTime(rand(0, 23), rand(0, 59), rand(0, 59));
        $endDate = $startDate->copy()->addDays(rand(1, 30))->setTime(rand(0, 23), rand(0, 59), rand(0, 59));

        return [
            'department_id' => $department_id,
            'course_id' => $course_id,
            'user_id' => User::where('name', '!=', 'Super Admin')->inRandomOrder()->first()->id,
            'hrs_spent' => $hrsSpent,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'assigned_by' => 1,
            'status' => $status,
            'certificate_issued_date' => $certificateIssuedDate,
        ];
    }
}
