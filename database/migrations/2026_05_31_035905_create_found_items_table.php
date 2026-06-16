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
    Schema::create('found_items', function (Blueprint $table) {

        $table->id();

        $table->string('item_name');

        $table->foreignId('category_id')
            ->constrained()
            ->cascadeOnDelete();

        $table->foreignId('security_post_id')
            ->constrained()
            ->cascadeOnDelete();

        $table->foreignId('created_by')
            ->constrained('users')
            ->cascadeOnDelete();

        $table->string('photo')->nullable();

        $table->text('description')->nullable();

        $table->string('location_found');

        $table->timestamp('found_at');

        $table->enum('status', [
            'Tersedia',
            'Sudah Diambil'
        ])->default('Tersedia');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('found_items');
    }
};
