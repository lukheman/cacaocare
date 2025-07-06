<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogDiagnosis extends Model
{
    protected $table = 'log_diagnosis';

    protected $guarded = [];

    public function penyakit()
    {
        return $this->belongsToMany(Penyakit::class, 'log_diagnosis_penyakit', 'id_log_diagnosis', 'id_penyakit')->withPivot('belief');
    }

    public function gejala()
    {
        return $this->belongsToMany(Gejala::class, 'log_diagnosis_gejala', 'id_log_diagnosis', 'id_gejala');
    }

    public static function simpan($nama, $umur, $id_penyakit, $belief)
    {
        return self::create([
            'nama' => $nama,
            'umur' => $umur,
            'id_penyakit' => $id_penyakit,
            'belief' => $belief,
        ]);
    }
}
