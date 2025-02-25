<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventInvitation extends Model
{
    protected $fillable = [
        'event_id',
        'user_id',
        'image'
    ];
}
