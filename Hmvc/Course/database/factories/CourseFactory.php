<?php

namespace Hmvc\Course\Database\Factories;

use App\Models\User;
use Hmvc\Course\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        DB::table('courses')->truncate();

        $department_id = rand(1, 12);
        $category_id = rand(1, 12);
        $status = rand(0, 1);
        $featured_status = rand(0, 1);
        $published = rand(0, 1);
        $duration = rand(1, 100);
        $title = fake()->unique()->randomElement([
            'Java', 'PHP', '#C', 'Python', 'DOT Net', 'R and Software Development',
            'Web Development or Full Stack Developer', 'Google Cloud Platform Architecture', 'JavaScript', 'Angular 16',
            'Redux and React', 'Android N Developer', ' iOS 11 and Swift Developer', 'NodeJS', ' C++ and Unreal Engine Developer Course',
            'Master Jenkins', 'Docker Mastery', 'Cyber Security Course', 'PG Diploma in Machine Learning and AI',
            'Database Concepts', 'Data Analysis Concept', 'Functions Charts & Slicers',
            'Data Visualization', 'Diploma in HRM', 'Training & Development', 'HR Analytics', 'Learn Telecalling Etiquettes',
            'Computer Networks',
            'Office Maitaining Concepts', 'Medical Coding', 'Tally', 'Accounting & Management Concepts',
        ]);

        $slug = Str::slug($title);

        return [
            'title' => $title,
            'slug' => $slug,
            'department_id' => $department_id,
            'category_id' => $category_id,
            'video_url' => fake()->url(),
            'course_level' => fake()->randomElement(['easy', 'intermediate', 'difficult']),
            'featured_status' => $featured_status,
            'published' => $published,
            'status' => $status,
            'duration' => $duration,
            'created_by' => User::where('name', '=', 'Super Admin')->first()->id,
        ];
    }
}
