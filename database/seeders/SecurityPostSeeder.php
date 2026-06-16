<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SecurityPost;

class SecurityPostSeeder extends Seeder
{
    public function run(): void
    {
        SecurityPost::create([
            'name' => 'Satpam Gerbang'
        ]);

        SecurityPost::create([
            'name' => 'Satpam Parkiran'
        ]);
    }
}