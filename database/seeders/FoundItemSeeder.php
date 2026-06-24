<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FoundItem;

class FoundItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [

            [
                'item_name' => 'Laptop Asus',
                'category_id' => 1,
                'security_post_id' => 1,
                'created_by' => 1,
                'photo' => 'found-items/laptop.jpg',
                'description' => 'Laptop ditemukan di ruang kelas.',
                'location_found' => 'Gedung A',
                'found_at' => now()->subDays(10),
                'status' => 'Tersedia',
            ],

            [
                'item_name' => 'Dompet Hitam',
                'category_id' => 2,
                'security_post_id' => 1,
                'created_by' => 1,
                'photo' => 'found-items/dompet.jpg',
                'description' => 'Dompet kulit hitam.',
                'location_found' => 'Kantin',
                'found_at' => now()->subDays(8),
                'status' => 'Tersedia',
            ],

            [
                'item_name' => 'Kunci Motor Honda',
                'category_id' => 4,
                'security_post_id' => 2,
                'created_by' => 1,
                'photo' => 'found-items/kunci.jpg',
                'description' => 'Kunci motor dengan gantungan merah.',
                'location_found' => 'Parkiran',
                'found_at' => now()->subDays(7),
                'status' => 'Tersedia',
            ],

            [
                'item_name' => 'Helm KYT',
                'category_id' => 4,
                'security_post_id' => 2,
                'created_by' => 1,
                'photo' => 'found-items/helm.jpg',
                'description' => 'Helm warna hitam.',
                'location_found' => 'Parkiran',
                'found_at' => now()->subDays(6),
                'status' => 'Sudah Diambil',
            ],

            [
                'item_name' => 'Tas Eiger',
                'category_id' => 4,
                'security_post_id' => 1,
                'created_by' => 1,
                'photo' => 'found-items/tas.jpg',
                'description' => 'Tas ransel warna biru.',
                'location_found' => 'Perpustakaan',
                'found_at' => now()->subDays(5),
                'status' => 'Sudah Diambil',
            ],

            [
                'item_name' => 'Flashdisk Sandisk',
                'category_id' => 1,
                'security_post_id' => 1,
                'created_by' => 1,
                'photo' => 'found-items/laptop.jpg',
                'description' => 'Flashdisk 32GB.',
                'location_found' => 'Lab Komputer',
                'found_at' => now()->subDays(4),
                'status' => 'Tersedia',
            ],

            [
                'item_name' => 'Charger Laptop',
                'category_id' => 1,
                'security_post_id' => 1,
                'created_by' => 1,
                'photo' => 'found-items/laptop.jpg',
                'description' => 'Charger Asus.',
                'location_found' => 'Ruang Dosen',
                'found_at' => now()->subDays(3),
                'status' => 'Tersedia',
            ],

            [
                'item_name' => 'Kartu KTM',
                'category_id' => 4,
                'security_post_id' => 1,
                'created_by' => 1,
                'photo' => 'found-items/dompet.jpg',
                'description' => 'Kartu mahasiswa.',
                'location_found' => 'Masjid Kampus',
                'found_at' => now()->subDays(2),
                'status' => 'Tersedia',
            ],

            [
                'item_name' => 'Botol Minum',
                'category_id' => 4,
                'security_post_id' => 2,
                'created_by' => 1,
                'photo' => 'found-items/tas.jpg',
                'description' => 'Botol warna biru.',
                'location_found' => 'Lapangan',
                'found_at' => now()->subDay(),
                'status' => 'Tersedia',
            ],

            [
                'item_name' => 'Headset Bluetooth',
                'category_id' => 1,
                'security_post_id' => 1,
                'created_by' => 1,
                'photo' => 'found-items/laptop.jpg',
                'description' => 'Headset warna putih.',
                'location_found' => 'Aula',
                'found_at' => now(),
                'status' => 'Tersedia',
            ],

        ];

        foreach ($items as $item) {
            FoundItem::create($item);
        }
    }
}