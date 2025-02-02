<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CardImage extends Model
{
    use HasFactory;

    protected $table = 'card_images'; // Create this table via migration
    protected $fillable = ['category_name','image_path'];



    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }
}
