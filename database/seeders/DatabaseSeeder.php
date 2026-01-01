<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'nama'     => 'Akhmad Furqon',
            'email'    => 'admin@gmail.com',
            'jabatan'  => 'Admin',
            'password' => Hash::make('password123'),
            'is_tugas' => false,
        ]);

         User::create([
            'nama'     => 'Akhmad',
            'email'    => 'akhmad@gmail.com',
            'jabatan'  => 'Karyawan',
            'password' => Hash::make('password123'),
            'is_tugas' => false,
        ]);

         User::create([
            'nama'     => 'Farida',
            'email'    => 'farida@gmail.com',
            'jabatan'  => 'Karyawan',
            'password' => Hash::make('password123'),
            'is_tugas' => false,
        ]); 
        
    }
}
