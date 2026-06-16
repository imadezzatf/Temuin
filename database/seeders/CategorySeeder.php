<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Elektronik',
            'Dompet',
            'Tas',
            'Kunci',
            'Kartu Identitas',
            'Botol Minum',
            'Aksesoris',
            'Lainnya'
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }
}