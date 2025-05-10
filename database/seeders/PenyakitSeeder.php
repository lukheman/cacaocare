<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Penyakit;

class PenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Penyakit::query()->create([
            'kode' => 'P01',
            'nama' => 'GERD',
            'deskripsi' => 'GERD adalah penyakit yang menyebabkan rasa terbakar di data akibat naiknya asam lambung ke esofagus'
        ]);

        Penyakit::query()->create([
            'kode' => 'P02',
            'nama' => 'Tukak Lambung',
            'deskripsi' => 'Tukak lambung adalah luka yang terjadi pada lapisan lambung'
        ]);

        Penyakit::query()->create([
            'kode' => 'P03',
            'nama' => 'Gastroparesis',
            'deskripsi' => 'Gastroparesis adalah gangguan pada otot lambung yang mengakitbatkan peregerakan lambugn untuk mencerna makanan ke usus menjadi lebih lambat'
        ]);

        Penyakit::query()->create([
            'kode' => 'P04',
            'nama' => 'Despepsia',
            'deskripsi' => 'Despepsia adalah kondisi yang menyebabkan rasa tidak nyaman atau nyeri pada bagian atas perut, yang sering kali disebabkan oleh peningkatan asam lambung'
        ]);

    }
}
