<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Penyakit;
use App\Models\Gejala;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /* User::factory(10)->create(); */

        User::factory()->create([
            'name' => 'Akmal admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('asdf')
        ]);

        User::factory()->create([
            'name' => 'Citra Wulandari',
            'email' => 'citra@gmail.com',
            'role' => 'user',
            'password' => bcrypt('asdf')
        ]);

        $this->call([
            PenyakitSeeder::class,
            GejalaSeeder::class
        ]);


        // Sync gejala ke penyakit
        $penyakit = Penyakit::find(1);
        $penyakit->gejala()->attach(1);
        $penyakit->gejala()->attach(2);
        $penyakit->gejala()->attach(3);

        $penyakit = Penyakit::find(2);
        $penyakit->gejala()->attach(1, ['bobot' => 0.3]);
        $penyakit->gejala()->attach(2);
        $penyakit->gejala()->attach(3, ['bobot' => 0.1]);
        $penyakit->gejala()->attach(10);


    }
}
