<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public function getEvent(){
        return $this->belongsTo(Event::class, 'event_id');
    }
}
