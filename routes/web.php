<?php

use App\Http\Controllers\DaftarPengunjungController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [UserController::class, 'index'])->name('users.index');
Route::get('/users', [UserController::class, 'store'])->name('users.create');
Route::get('/dashboard', [DaftarPengunjungController::class, 'index'])->name('admin.index');
Route::post('/daftar-pengunjung', [DaftarPengunjungController::class, 'daftar'])->name('admin.daftar');
route::post('/cetak', [DaftarPengunjungController::class, 'cetak']);
