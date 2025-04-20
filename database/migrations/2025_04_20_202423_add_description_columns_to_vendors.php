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
        Schema::table('vendors', function (Blueprint $table) {
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->float('travel_cost')->nullable();
            $table->float('loding_cost')->nullable();
            $table->longText('description')->nullable();
            $table->longText('cancelation_policy')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vendors', function (Blueprint $table) {
            $table->dropColumn('latitude');
            $table->dropColumn('longitude');
            $table->dropColumn('travel_cost');
            $table->dropColumn('loding_cost');
            $table->dropColumn('description');
            $table->dropColumn('cancelation_policy');
        });
    }
};
