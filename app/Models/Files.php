<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    /** @use HasFactory<\Database\Factories\FilesFactory> */
    use HasFactory;
    protected $fillable = [
        'file_name',
        'file_path',
        'file_type',
        'file_size',
        'file_extension',
        'created_by_id',
        'created_by',
        'project_id',
        'folder',
    ];
}
