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
        Schema::table('events', function (Blueprint $table) {
            $table->string('event_start_date')->after('longitude');
            $table->string('event_end_date')->after('event_start_date');
            $table->string('registration_start_date')->nullable()->after('ticket_price');
            $table->string('registration_end_date')->nullable()->after('registration_start_date');
            $table->string('gallery_image')->nullable()->after('banner');
            $table->boolean('status')->default(1)->after('gallery_image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn(['event_start_date', 'event_end_date','registration_start_date','registration_end_date', 'gallery_image', 'status']);
        });
    }
};
