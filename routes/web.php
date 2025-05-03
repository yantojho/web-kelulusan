<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{LoginController,NilaiController, SiswaController,MapelController, JenisMapelController};



Route::get('/', function () {
    return view('index');
});

Route::get('/admin/dashboard', function(){
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/logins', [LoginController::class, 'index'])->name('login');
Route::post('/logins', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/admin/push', function(){
    $user = [
        'name' => 'admin',
        'email' => 'admin@admin.com',
        'password' => Hash::make('admin'),
    ];

    \App\Models\User::create($user);
});

// nilai
Route::get('/nilai', [nilaiController::class, 'index'])->name('admin-nilai');
Route::get('/nilai/edit/{id}', [nilaiController::class, 'edit'])->name('admin-nilai.edit');
Route::put('/nilai/edit/{id}', [nilaiController::class, 'update'])->name('admin-nilai.update');
Route::post('/nilai/import_excel', [nilaiController::class, 'import_excel'])->name('admin-nilai-import');

// siswa
Route::get('/siswa', [SiswaController::class, 'index'])->name('admin-siswa');
Route::post('/siswa/import_excel', [SiswaController::class, 'import_excel'])->name('admin-siswa-import');

//Mapel
Route::resource('mapel', MapelController::class)
    ->name('index', 'admin.mapel')
    ->name('create', 'admin.mapel.create')
    ->name('store', 'admin.mapel.store')
    ->name('edit', 'admin.mapel.edit_mapel')
    ->name('update', 'admin.mapel.update')
    ->name('destroy', 'admin.mapel.delete')
    ->name('show', 'admin.mapel.show');

Route::resource('jenis-mapel', JenisMapelController::class)
    ->name('index', 'admin.jenismapel')
    ->name('create', 'admin.jenismapel.create')
    ->name('store', 'admin.jenismapel.store')
    ->name('edit', 'admin.jenismapel.edit_jenismapel')
    ->name('update', 'admin.jenismapel.update')
    ->name('destroy', 'admin.jenismapel.delete')
    ->name('show', 'admin.jenismapel.show');