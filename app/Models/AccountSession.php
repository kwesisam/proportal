<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Account;

class AccountSession extends Model
{
    /** @use HasFactory<\Database\Factories\AccountSessionFactory> */
    use HasFactory;
    protected $table = 'account_session';

    protected $fillable = [
        'account_id',
        'session_token',
        'expires_at',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
    
}
