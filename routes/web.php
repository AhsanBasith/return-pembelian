<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\PengirimanController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);
// CRUD Gudang->Barang
Route::get('/gudang', [GudangController::class, 'index']);
Route::post('/gudang/storebarang', [GudangController::class, 'storebarang']);
Route::post('/gudang/updatebarang/{id}', [GudangController::class, 'updatebarang']);
Route::post('/gudang/destroybarang/{id}', [GudangController::class, 'destroybarang']);
// Update Kualitas Barang
Route::post('/gudang/updatekualitas/{id}', [GudangController::class, 'updatekualitas']);

// CRUD Admin->Kualitas Barang
Route::get('/admin', [AdminController::class, 'index']);
Route::post('/admin/tambahnota/{id}', [AdminController::class, 'tambahnota']);
Route::post('/admin/updatenota/{id}', [AdminController::class, 'updatenota']);
Route::post('/admin/destroynota/{id}', [AdminController::class, 'destroynota']);

// CRUD Pengiriman
Route::get('/pengiriman', [PengirimanController::class, 'index']);
Route::post('/pengiriman/tambahpengiriman/{id}', [PengirimanController::class, 'tambahpengiriman']);
Route::post('/pengiriman/updatepengiriman/{id}', [PengirimanController::class, 'updatepengiriman']);
Route::post('/pengiriman/destroypengiriman/{id}', [PengirimanController::class, 'destroypengiriman']);
