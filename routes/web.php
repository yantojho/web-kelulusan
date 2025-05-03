<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{LoginController,NilaiController, SiswaController};
use Illuminate\Support\Facades\Hash;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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
Route::post('/nilai/import_excel', [nilaiController::class, 'import_excel'])->name('admin-nilai-import');

// siswa
Route::get('/siswa', [SiswaController::class, 'index'])->name('admin-siswa');
Route::post('/siswa/import_excel', [SiswaController::class, 'import_excel'])->name('admin-siswa-import');