<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'department',
        'created_by_id',
        'created_by'
    ];
    /** @use HasFactory<\Database\Factories\DepartmentFactory> */
    use HasFactory;
}
