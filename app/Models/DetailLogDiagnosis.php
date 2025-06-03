<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DetailLogDiagnosis extends Model
{

    protected $table = 'detail_log_diagnosis';
    protected $guarded = [];

    public function logDiagnosis() {
        return $this->belongsTo(LogDiagnosis::class, 'id_log_diagnosis');
    }

    public function gejala(): HasOne {
        return $this->hasOne(Gejala::class);
    }

}
