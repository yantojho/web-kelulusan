<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{LoginController,NilaiController, SiswaController,MapelController};



Route::get('/', function () {
    return view('index');
});

Route::get('/admin/dashboard', function(){
    return view('admin.dashboard');
});

Route::get('/logins', [LoginController::class, 'index'])->name('login');

// nilai
Route::get('/nilai', [nilaiController::class, 'index'])->name('admin-nilai');
Route::post('/nilai/import_excel', [nilaiController::class, 'import_excel'])->name('admin-nilai-import');

// siswa
Route::get('/siswa', [SiswaController::class, 'index'])->name('admin-siswa');
Route::post('/siswa/import_excel', [SiswaController::class, 'import_excel'])->name('admin-siswa-import');

//Mapel
Route::resource('mapel', MapelController::class);