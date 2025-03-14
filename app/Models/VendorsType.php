<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendorsType extends Model
{ 
    protected $guarded = [];

    public function users(){
        return $this->hasMany(User::class, 'vendor_type');
    }
}
