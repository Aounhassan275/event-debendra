<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardImagesTable extends Migration
{
    public function up()
{
    Schema::create('card_images', function (Blueprint $table) {
        $table->id();
        $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Ensure this line exists
        $table->string('image_path');
        $table->timestamps();
    });
}


    public function down()
    {
        Schema::dropIfExists('card_images');
    }
};
