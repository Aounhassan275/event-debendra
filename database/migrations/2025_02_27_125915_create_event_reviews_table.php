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
        if (Schema::hasTable('event_reviews')) {
            Schema::dropIfExists('event_reviews');
        }
        Schema::create('event_reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('event_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_reviews');
    }
};
