<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Landing::class)->name('landing');
Route::get('/login', \App\Livewire\Login::class)->name('login')->middleware('guest');
Route::get('/logout', App\Http\Controllers\LogoutController::class)->name('logout');
Route::get('/registrasi', \App\Livewire\Registration::class)->name('registrasi')->middleware('guest');
Route::get('/profile', \App\Livewire\Profile::class)->name('profile')->middleware('auth');

Route::prefix('admin')->middleware('auth')->group(function() {
    Route::get('/dashboard', \App\Livewire\Admin\Dashboard::class)->name('admin.dashboard');
    Route::get('/penyakit', \App\Livewire\Admin\Penyakit\Index::class)->name('admin.penyakit.index');
    Route::get('/gejala', \App\Livewire\Gejala\Index::class)->name('admin.gejala.index');
    Route::get('/rule', \App\Livewire\Rule\Index::class)->name('admin.rule.index');
    Route::get('/diagnosis', \App\Livewire\Diagnosis::class)->name('admin.diagnosis');
    Route::get('/gejala-penyakit', \App\Livewire\GejalaPenyakit\Index::class)->name('admin.gejala-penyakit.index');
    Route::get('/laporan-gejala-penyakit', \App\Livewire\Admin\LaporanGejalaPenyakit::class)->name('admin.laporan-gejala-penyakit');
});

Route::prefix('laporan')->controller(\App\Http\Controllers\LaporanController::class)->group(function() {

    Route::post('/laporan-gejala-penyakit', 'gejalaPenyakit')->name('laporan-gejala-penyakit');

});

Route::get('/diagnosis', \App\Livewire\Diagnosis::class)->name('diagnosis');

/* Route::prefix('pasien')->middleware('auth')->group(function() { */
/*     Route::get('/dashboard', \App\Livewire\Pasien\Dashboard::class)->name('pasien.dashboard'); */
/* }); */
