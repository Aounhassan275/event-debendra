<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TempUser extends Model
{
    protected $fillable = [
        'name',
        'email',
        'verification_code',
        'expires_at',
        'password',
        'phone',
        'is_verified'
    ];
}
