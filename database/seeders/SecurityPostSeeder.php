<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SecurityPost;

class SecurityPostSeeder extends Seeder
{
    public function run(): void
    {
        SecurityPost::firstOrCreate([
            'name' => 'Satpam Gerbang'
        ]);

        SecurityPost::firstOrCreate([
            'name' => 'Satpam Parkiran'
        ]);
    }
}