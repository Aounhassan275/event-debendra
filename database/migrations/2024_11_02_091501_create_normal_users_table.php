<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNormalUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('normal_users', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // User's name
            $table->string('email')->unique(); // User's email, unique
            $table->string('password'); // User's password, hashed
            $table->string('phone')->nullable(); // User's phone, optional
            $table->string('city')->nullable(); // User's city, optional
            $table->string('address')->nullable(); // User's address, optional
            $table->string('user_image')->nullable(); // Path to user's image, optional
            $table->boolean('status');
            $table->timestamps(); // Created and updated timestamps
        });
        Schema::table('normal_users', function (Blueprint $table) {
            $table->string('user_image')->default('profile.jpg')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('normal_users');
    }
}
