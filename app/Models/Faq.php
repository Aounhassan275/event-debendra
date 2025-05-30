<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
        'question',
        'answer',
        'user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
