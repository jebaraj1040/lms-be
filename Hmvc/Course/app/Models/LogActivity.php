<?php

namespace Hmvc\Course\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Hmvc\Course\Database\Factories\LogActivityFactory;

class LogActivity extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'department_id',
        'course_id',
        'user_id'
    ];
    protected $table = "activity_log";

    protected static function newFactory(): LogActivityFactory
    {
        return LogActivityFactory::new();
    }
}
