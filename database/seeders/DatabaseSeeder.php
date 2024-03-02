<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@sigakarya.com',
            'password' => Hash::make('admin'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Bendahara',
            'email' => 'bendahara@sigakarya.com',
            'password' => Hash::make('bendahara'),
            'role' => 'bendahara'
        ]);

        User::create([
            'name' => 'Karyawan',
            'email' => 'karyawan@sigakarya.com',
            'password' => Hash::make('karyawan'),
            'role' => 'karyawan'
        ]);
    }
}
