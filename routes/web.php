<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Login::class)->name('login')->middleware('guest');
Route::get('/logout', App\Http\Controllers\LogoutController::class)->name('logout');

Route::prefix('admin')->middleware('auth')->group(function() {
    Route::get('/dashboard', \App\Livewire\Admin\Dashboard::class)->name('admin.dashboard');
    Route::get('/penyakit', \App\Livewire\Admin\Penyakit\Index::class)->name('admin.penyakit.index');
    Route::get('/gejala', \App\Livewire\Gejala\Index::class)->name('admin.gejala.index');
    Route::get('/rule', \App\Livewire\Rule\Index::class)->name('admin.rule.index');
    Route::get('/diagnosis', \App\Livewire\Diagnosis::class)->name('admin.diagnosis');
    Route::get('/gejala-penyakit', \App\Livewire\GejalaPenyakit\Index::class)->name('admin.gejala-penyakit.index');
});

Route::prefix('user')->middleware('auth')->group(function() {
    Route::get('/dashboard', \App\Livewire\User\Dashboard::class)->name('user.dashboard');
});
