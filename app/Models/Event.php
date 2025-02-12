<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['',
        'title', 'category','subactegory_id', 'description', 'email', 'phone', 'website', 'address',
        'latitude', 'longitude','event_start_date','event_end_date','start_datetime', 'end_datetime', 'type',
        'max_tickets', 'tickets_per_person', 'ticket_price','registration_start_date','registration_end_date',
        'registration_start_datetime', 'registration_end_datetime', 'logo', 'banner','gallery_image','status',
        'user_id'
    ];

    public function getCategory(){
        return $this->belongsTo(Category::class, 'category');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function eventImages(){
        return $this->hasMany(EventImage::class, 'event_id');
    }
}
