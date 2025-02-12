<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventImageLikeDislike extends Model
{
    protected $fillable = [
        'event_image_id',
        'user_id',
        'is_like'
    ];
}
