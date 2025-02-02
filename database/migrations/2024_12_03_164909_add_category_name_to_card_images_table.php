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
        Schema::table('card_images', function (Blueprint $table) {
            $table->string('category_name')->after('category_id'); // Add 'category_name' after 'category_id'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('card_images', function (Blueprint $table) {
            $table->dropColumn('category_name'); // Remove 'category_name' during rollback
        });
    }
};
