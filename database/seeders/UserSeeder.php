<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@temuin.test'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        $admin->assignRole('super_admin');

        $satpam = User::firstOrCreate(
            ['email' => 'satpam@temuin.test'],
            [
                'name' => 'Satpam',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        $satpam->assignRole('satpam');

        User::firstOrCreate(
            ['email' => 'mahasiswa@kampus.com'],
            [
                'name' => 'Mahasiswa',
                'password' => Hash::make('password'),
                'role' => 'user',
            ]
        );
    }
}
