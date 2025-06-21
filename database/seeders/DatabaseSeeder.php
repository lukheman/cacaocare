<?php

namespace Database\Seeders;

use App\Enums\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

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
            'password' => bcrypt('asdf'),
        ]);

    }
}
