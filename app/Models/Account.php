<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use App\Models\AccountSession;

class Account extends Model implements Authenticatable
{
    use AuthenticatableTrait;
    public function accountSession()
    {
        return $this->hasMany(AccountSession::class);
    }

    protected $fillable = [
        'username', 
        'full_name', 
        'email', 
        'password',
        'role'
    ];
    /** @use HasFactory<\Database\Factories\AccountFactory> */
    use HasFactory;
}
