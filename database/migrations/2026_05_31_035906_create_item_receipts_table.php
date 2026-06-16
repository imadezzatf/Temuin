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
    Schema::create('item_receipts', function (Blueprint $table) {

        $table->id();

        $table->foreignId('found_item_id')
            ->unique()
            ->constrained()
            ->cascadeOnDelete();

        $table->string('receiver_name');

        $table->dateTime('receiver_at');

        $table->text('notes')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_receipts');
    }
};
