<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Penyakit;
use App\Models\Gejala;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Enums\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Akmal admin',
            'email' => 'admin@gmail.com',
            'role' => Role::Admin,
            'password' => bcrypt('asdf')
        ]);


    }
}
