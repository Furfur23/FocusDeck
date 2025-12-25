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
        // User::factory(10)->create();

        User::create([
            'nama'     => 'Test User',
            'email'    => 'test@example.com',
            'jabatan'  => 'Admin',
            'password' => Hash::make('password123'),
            'is_tugas' => false,
        ]);
    }
}
