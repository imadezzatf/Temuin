<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('found_items', function (Blueprint $table) {

            $table->string('reporter_name')
                ->nullable()
                ->after('created_by');

            $table->string('reporter_phone')
                ->nullable()
                ->after('reporter_name');

        });
    }

    public function down(): void
    {
        Schema::table('found_items', function (Blueprint $table) {

            $table->dropColumn([
                'reporter_name',
                'reporter_phone'
            ]);

        });
    }
};