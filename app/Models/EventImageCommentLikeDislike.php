<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventImageCommentLikeDislike extends Model
{
    protected $fillable = [
        'event_image_comment_id',
        'user_id',
        'is_like'
    ];
}
