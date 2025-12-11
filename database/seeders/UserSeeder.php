<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin Novotel',
            'email' => 'admin@novotel.com',
            'password' => Hash::make('admin123'),
        ]);

        // Resepsionis
        User::create([
            'name' => 'Resepsionis Novotel',
            'email' => 'resepsionis@novotel.com',
            'password' => Hash::make('resepsionis123'),
        ]);
    }
}