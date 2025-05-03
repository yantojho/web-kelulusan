<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{LoginController,NilaiController};

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
});

Route::get('/logins', [LoginController::class, 'index'])->name('login');

Route::get('admin/nilai', [NilaiController::class,'index'])->name('admin-nilai');
Route::post('admin/nilai/import', [NilaiController::class,'import']);
Route::post('/nilai/import_excel', [NilaiController::class, 'import_excel']);