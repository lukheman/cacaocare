<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    protected $table = 'penyakit';

    protected $guarded = [];

    public function gejala() {
        return $this->belongsToMany(Gejala::class, 'gejala_penyakit', 'id_penyakit', 'id_gejala');
            /* ->withPivot('bobot'); */
    }

    public function logDiagnosis() {
        return $this->hasMany(LogDiagnosis::class, 'id_penyakit');
    }

}
