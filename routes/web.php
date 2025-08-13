<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Landing::class)->name('landing');
Route::get('/tentang-kami', \App\Livewire\AboutUs::class)->name('about-us');
Route::get('/login', \App\Livewire\Login::class)->name('login')->middleware('guest');
Route::get('/logout', App\Http\Controllers\LogoutController::class)->name('logout');
Route::get('/profile', \App\Livewire\Profile::class)->name('profile')->middleware('auth');

Route::get('/dashboard', \App\Livewire\Dashboard::class)->name('dashboard')->middleware('auth');
Route::get('/penyakit', \App\Livewire\PenyakitTable::class)->name('penyakit-table')->middleware('auth');
Route::get('/gejala', \App\Livewire\GejalaTable::class)->name('gejala-table')->middleware('auth');
Route::get('/rule', \App\Livewire\RuleTable::class)->name('rule-table')->middleware('auth');
Route::get('/riwayat-konsultasi', \App\Livewire\RiwayatKonsultasiTable::class)->name('riwayat-konsultasi-table')->middleware('auth');

Route::prefix('laporan')->controller(\App\Http\Controllers\LaporanController::class)->group(function () {


    Route::get('/laporan-riwayat-konsultasi', 'riwayatKonsultasi')->name('laporan-riwayat-konsultasi');

});

Route::get('/konsultasi', \App\Livewire\Diagnosis\Flow::class)->name('konsultasi');

