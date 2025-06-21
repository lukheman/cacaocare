<?php

namespace App\Http\Controllers;

use App\Models\LogDiagnosis;
use App\Models\Penyakit;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function gejalaPenyakit(Request $request)
    {

        $validated = $request->validate([
            'id_penyakit' => ['required', 'exists:penyakit,id'],
        ]);

        $penyakit = Penyakit::find($validated['id_penyakit']);

        return view('laporan.laporan-gejala-penyakit', [
            'penyakit' => $penyakit,
        ]);

    }

    public function diagnosisPasien(Request $request)
    {

        $log_diagnosis = LogDiagnosis::with('penyakit')->get();

        return view('laporan.laporan-diagnosis-pasien', [
            'log_diagnosis' => $log_diagnosis,
        ]);

    }

    public function diagnosisSatuPasien(Request $request)
    {
        $validated = $request->validate([
            'id_log_diagnosis' => ['required', 'exists:log_diagnosis,id'],
        ]);

        $diagnosis = LogDiagnosis::with(['penyakit', 'details.gejala'])->find($validated['id_log_diagnosis']);

        return view('laporan.laporan-diagnosis-satu-pasien', [
            'diagnosis' => $diagnosis,
        ]);

    }
}
