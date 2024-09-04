<?php

namespace Hmvc\Department\Models;

use Hmvc\Course\Models\Course;
use Hmvc\Course\Models\CourseSubscription;
use Hmvc\Department\Database\Factories\DepartmentFactoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Department extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name', 'status', 'company_id',
    ];

    protected static function newFactory(): DepartmentFactoryFactory
    {
        return DepartmentFactoryFactory::new();
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
