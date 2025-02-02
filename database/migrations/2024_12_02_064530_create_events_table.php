<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('events', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('category');
        $table->text('description')->nullable();
        $table->string('email');
        $table->string('phone')->nullable();
        $table->string('website')->nullable();
        $table->string('address');
        $table->string('latitude')->nullable();
        $table->string('longitude')->nullable();
        $table->dateTime('start_datetime');
        $table->dateTime('end_datetime');
        $table->enum('type', ['public', 'private']);
        $table->integer('max_tickets')->nullable();
        $table->integer('tickets_per_person')->nullable();
        $table->decimal('ticket_price', 8, 2)->nullable();
        $table->dateTime('registration_start_datetime')->nullable();
        $table->dateTime('registration_end_datetime')->nullable();
        $table->string('logo')->nullable();
        $table->string('banner')->nullable();
        $table->boolean('featured')->default(false);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
