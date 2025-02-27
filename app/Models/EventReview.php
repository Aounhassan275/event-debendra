<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventReview extends Model
{
    protected $fillable = [
        'event_id',
        'user_id',
        'description'
    ];
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
