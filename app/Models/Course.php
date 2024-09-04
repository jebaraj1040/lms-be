<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'department_id',
        'category_id',
        'image',
        'details',
        'meta_title',
        'video_url',
        'meta_description',
        'published',
        'status',
        'featured_status',
        'created_by', 'duration'];
}
