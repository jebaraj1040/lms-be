<?php

namespace Hmvc\Course\Models;

use App\Models\User;
use Hmvc\Course\Database\Factories\CourseSubscriptionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSubscription extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'department_id',
        'course_id',
        'user_id',
        'hrs_spent',
        'start_date',
        'end_date',
        'assigned_by',
        'status',
        'certificate_issued_date',
    ];

    protected static function newFactory(): CourseSubscriptionFactory
    {
        return CourseSubscriptionFactory::new();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
