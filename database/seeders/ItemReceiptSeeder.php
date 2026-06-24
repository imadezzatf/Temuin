<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ItemReceipt;

class ItemReceiptSeeder extends Seeder
{
    public function run(): void
    {
        ItemReceipt::create([
            'found_item_id' => 1,
            'receiver_name' => 'Admin Demo',
            'receiver_at' => now()->subDays(2),
            'notes' => 'Laptop telah diserahkan.',
        ]);

        ItemReceipt::create([
            'found_item_id' => 4,
            'receiver_name' => 'Admin Demo',
            'receiver_at' => now()->subDay(),
            'notes' => 'Helm telah diserahkan.',
        ]);
    }
}
