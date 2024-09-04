<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = ['id'];

    protected $fillable = [
        'name', 'status', 'slug', 'created_by', 'department_id', 'updated_by', 'deleted_by',
    ];

    protected $table = 'categories';
}
