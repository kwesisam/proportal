<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    protected $fillable = [
        'name',
        'owner_id',
        'owner_name'
    ];
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;
}
