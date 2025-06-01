<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogDiagnosis extends Model
{
    protected $table = 'log_diagnosis';

    protected $guarded = [];

    public function penyakit() {
        return $this->belongsTo(Penyakit::class, 'id_penyakit');
    }

    public static function simpan($nama, $umur, $id_penyakit, $belief) {
        self::create([
            'nama' => $nama,
            'umur' => $umur,
            'id_penyakit' => $id_penyakit,
            'belief' => $belief
        ]);
    }

}
