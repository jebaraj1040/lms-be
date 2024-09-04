<?php

namespace Hmvc\Course\Models;

use Hmvc\Course\Database\Factories\CourseFactory;
use Hmvc\Department\Models\Department;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'slug',
        'department_id',
        'category_id',
        'video_url',
        'course_level',
        'featured_status',
        'published',
        'status',
        'duration',
        'created_by',
    ];

    protected $table = 'courses';

    protected static function newFactory(): CourseFactory
    {
        return CourseFactory::new();
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(CourseSubscription::class);
    }

    protected $hidden = ['created_at','updated_at','created_by','updated_by','deleted_by','deleted_at'];
}
