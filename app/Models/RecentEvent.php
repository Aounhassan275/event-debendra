<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecentEvent extends Model
{
    protected $fillable = [
        'event_id',
        'user_id'
    ];
}
