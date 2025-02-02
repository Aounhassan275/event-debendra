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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('brand_name')->nullable();
            $table->string('photo')->nullable();
            $table->string('location')->nullable();
            $table->string('website_link')->nullable();
            $table->string('alt_email')->nullable();
            $table->string('instagram')->nullable();
            $table->string('name')->nullable();
            $table->string('facebook')->nullable();
            $table->string('number')->nullable();
            $table->string('youtube')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
