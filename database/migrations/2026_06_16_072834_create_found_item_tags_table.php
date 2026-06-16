<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('found_item_tags', function (Blueprint $table) {

            $table->foreignId('found_item_id')
                ->constrained('found_items')
                ->cascadeOnDelete();

            $table->foreignId('tag_id')
                ->constrained('tags')
                ->cascadeOnDelete();

            $table->primary([
                'found_item_id',
                'tag_id'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('found_item_tags');
    }
};