<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClaimRequest;

class ClaimRequestSeeder extends Seeder
{
    public function run(): void
    {
        ClaimRequest::create([
            'found_item_id' => 1,
            'user_id' => 1,
            'nim' => '0110225001',
            'phone' => '081234567890',
            'notes' => 'Laptop saya.',
            'status' => 'Approved',
        ]);

        ClaimRequest::create([
            'found_item_id' => 2,
            'user_id' => 1,
            'nim' => '0110225002',
            'phone' => '081234567891',
            'notes' => 'Dompet saya.',
            'status' => 'Pending',
        ]);

        ClaimRequest::create([
            'found_item_id' => 3,
            'user_id' => 1,
            'nim' => '0110225003',
            'phone' => '081234567892',
            'notes' => 'Kunci motor saya.',
            'status' => 'Rejected',
        ]);

        ClaimRequest::create([
            'found_item_id' => 4,
            'user_id' => 1,
            'nim' => '0110225004',
            'phone' => '081234567893',
            'notes' => 'Helm saya.',
            'status' => 'Approved',
        ]);
    }
}
