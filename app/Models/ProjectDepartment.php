<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDepartment extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectDepartmentFactory> */
    protected $fillable = [
        'project_id',
        'department_id',
        'created_by_id',
        'created_by'
    ];

    use HasFactory;
}
