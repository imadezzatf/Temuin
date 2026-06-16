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
    Schema::table('found_items', function ($table) {
        $table->index('status');
    });

    Schema::table('found_items', function ($table) {
        $table->index('found_at');
    });

    Schema::table('item_logs', function ($table) {
        $table->index('action');
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('found_items', function ($table) {
        $table->dropIndex(['status']);
        $table->dropIndex(['found_at']);
    });

    Schema::table('item_logs', function ($table) {
        $table->dropIndex(['action']);
    });
}
};
