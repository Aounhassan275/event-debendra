<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventImageComment extends Model
{
    protected $fillable = [
        'event_image_id',
        'user_id',
        'comment_id',
        'comment'
    ];
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function comments(){
        return $this->hasMany(EventImageComment::class, 'comment_id');
    }
}
