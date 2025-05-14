<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use Illuminate\Http\Request;

class LaporanController extends Controller
{

    public function gejalaPenyakit(Request $request) {

        $validated = $request->validate([
            'id_penyakit' => ['required', 'exists:penyakit,id']
        ]);

        $penyakit = Penyakit::find($validated['id_penyakit']);

        return view('laporan.laporan-gejala-penyakit', [
            'penyakit' => $penyakit
        ]);

    }

}
