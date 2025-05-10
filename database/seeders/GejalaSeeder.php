<?php

namespace Database\Seeders;

use App\Models\Gejala;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Gejala::query()->insert([
            ['kode' => 'G1', 'nama' => 'Riwayat DBD', 'bobot' => 0.4],
            ['kode' => 'G2', 'nama' => 'Riwayat Operasi Lambung', 'bobot' => 0.6],
            ['kode' => 'G3', 'nama' => 'Minum Analgetik', 'bobot' => 0.4],
            ['kode' => 'G4', 'nama' => 'Penyakit karena infeksi', 'bobot' => 0.8],
            ['kode' => 'G5', 'nama' => 'Perut tidak nyaman saat makan berlemak', 'bobot' => 0.6],
            ['kode' => 'G6', 'nama' => 'Konsumsi antidepresan', 'bobot' => 0.8],
            ['kode' => 'G7', 'nama' => 'Sering makan berlemak', 'bobot' => 0.6],
            ['kode' => 'G8', 'nama' => 'Riwayat kanker/kemoterapi', 'bobot' => 0.8],
            ['kode' => 'G9', 'nama' => 'Sering konsumsi kopi, rokok, alkohol', 'bobot' => 0.8],
            ['kode' => 'G10', 'nama' => 'Berat badan menurun', 'bobot' => 0.1],
            ['kode' => 'G11', 'nama' => 'Anoreksia', 'bobot' => 0.6],
            ['kode' => 'G12', 'nama' => 'Muntah berwarna kuning/pahit', 'bobot' => 0.1],
            ['kode' => 'G13', 'nama' => 'Perut terasa kembung', 'bobot' => 0.1],
            ['kode' => 'G14', 'nama' => 'Rongga mulut terasa asam', 'bobot' => 0.8],
            ['kode' => 'G15', 'nama' => 'Nyeri dada dan tenggorokan', 'bobot' => 0.7],
            ['kode' => 'G16', 'nama' => 'Sendawa berlebihan', 'bobot' => 0.4],
            ['kode' => 'G17', 'nama' => 'Cegukan berlebihan', 'bobot' => 0.7],
            ['kode' => 'G18', 'nama' => 'Batuk kering', 'bobot' => 0.8],
            ['kode' => 'G19', 'nama' => 'Sulit menelan makanan', 'bobot' => 0.6],
            ['kode' => 'G20', 'nama' => 'Muntah darah merah/hitam', 'bobot' => 0.7],
            ['kode' => 'G21', 'nama' => 'Nyeri ulu hati menetap', 'bobot' => 0.4],
            ['kode' => 'G22', 'nama' => 'Mual', 'bobot' => 0.1],
            ['kode' => 'G23', 'nama' => 'Muntah-muntah', 'bobot' => 0.3],
            ['kode' => 'G24', 'nama' => 'Tinja berwarna hitam', 'bobot' => 0.8],
            ['kode' => 'G25', 'nama' => 'Nyeri pada perut', 'bobot' => 0.8],
            ['kode' => 'G26', 'nama' => 'Nafsu makan menurun', 'bobot' => 0.9],
            ['kode' => 'G27', 'nama' => 'Mudah kenyang', 'bobot' => 0.4],
            ['kode' => 'G28', 'nama' => 'Cepat kenyang setelah sedikit makan', 'bobot' => 0.5],
            ['kode' => 'G29', 'nama' => 'Nyeri setelah makan', 'bobot' => 0.5],
            ['kode' => 'G30', 'nama' => 'Muntah cairan/muntah air', 'bobot' => 0.5],
            ['kode' => 'G31', 'nama' => 'Muntah makanan sebelumnya', 'bobot' => 0.9],
            ['kode' => 'G32', 'nama' => 'Perut terasa tidak nyaman', 'bobot' => 0.6],
            ['kode' => 'G33', 'nama' => 'Rasa penuh setelah makan', 'bobot' => 0.8],
            ['kode' => 'G34', 'nama' => 'Buang gas berlebihan', 'bobot' => 0.4],
            ['kode' => 'G35', 'nama' => 'Rasa kembung di saluran cerna atas', 'bobot' => 0.4],
        ]);


    }
}
