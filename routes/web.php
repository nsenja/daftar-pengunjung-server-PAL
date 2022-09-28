<?php

use App\Http\Controllers\DaftarPengunjungController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::resource('/users', UserController::class);

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DaftarPengunjungController::class, 'index'])->name('admin.index');
    Route::post('/daftar-pengunjung', [DaftarPengunjungController::class, 'daftar'])->name('admin.daftar');
    route::post('/cetak', [DaftarPengunjungController::class, 'cetak']);
});
Route::get('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/logout', [LogoutController::class, 'index'])->name('logout.index');
Route::post('/update/{id}', [LogoutController::class, 'update'])->name('logout.update');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
