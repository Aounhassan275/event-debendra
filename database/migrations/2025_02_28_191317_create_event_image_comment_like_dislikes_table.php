<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('event_image_comment_like_dislikes', function (Blueprint $table) {
            $table->id();
            $table->integer('event_image_comment_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->boolean('is_like')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_image_comment_like_dislikes');
    }
};
