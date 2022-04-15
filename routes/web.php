<?php

use App\Http\Controllers\AuthentiController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\OverviewDashboard;
use App\Http\Controllers\PenjualanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthentiController::class,'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthentiController::class,'store']);
Route::post('/logout', [AuthentiController::class,'logout']);

Route::get('/dashboard', [OverviewDashboard::class,'index'])->middleware('auth');
Route::resource('/dashboard/barang', BarangController::class)->middleware('auth');
Route::resource('/dashboard/categories', CategoryController::class)->middleware('auth');

Route::get('/dashboard/penjualan', [PenjualanController::class,'index'])->middleware('auth');

Route::get('/dashboard/penjualan/invoice/{no_order}', [KasirController::class,'invoice']);
