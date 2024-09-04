<?php

namespace Hmvc\Course\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Hmvc\Course\Models\LogActivity;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class LogActivityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = LogActivity::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        DB::table('activity_log')->truncate();

        $course_id = rand(1, 10);
        $department_id = rand(1, 12);
        $user_id = rand(2,199);
        $year = Carbon::now()->year;
        $startDate = Carbon::now()->year($year)->addDays(rand(0, Carbon::now()->dayOfYear - 1))->setTime(rand(0, 23), rand(0, 59), rand(0, 59));
        $endDate = (clone $startDate)->addHour();
        return [
            'department_id' =>$department_id,
            'course_id' =>$course_id,
            'user_id' =>$user_id,
            'created_at'=>$startDate,
            'updated_at'=>$endDate
        ];
    }
}

