<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventImage extends Model
{
    protected $fillable = [
        'user_id',
        'event_id',
        'image'
    ];
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
