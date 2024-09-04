<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'code',
        'contact_no',
        'email',
        'designation',
        'role_id',
        'department_id',
        'skills',
        'total_experience',
        'relevant_experience',
        'current_ctc',
        'expected_ctc',
        'last_reason_resignation',
        'location',
        'notice_period',
        'image',
        'cri_past_six_month',
        'acquaintances_in_cri',
        'family_backgroud',
        'status',
        'created_by',
    ];

    protected $table = 'employees';
}
