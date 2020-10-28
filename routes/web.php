<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReturController;
use App\Http\Controllers\InboundController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OutboundController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmploymentController;
use App\Http\Controllers\OutboundDetailController;

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

Route::get('/', function(){
    return view('welcome');
});

//Login
Route::get('login', [AuthController::class, 'index']);
Route::post('proses_login', [AuthController::class, 'proses_login']);
Route::post('logout', [AuthController::class, 'logout']);

//Suplier
Route::get('/supplier', [SupplierController::class, 'index']);
Route::get('/supplier/create', [SupplierController::class, 'create']);
Route::post('/supplier/store', [SupplierController::class, 'store']);
Route::get('/supplier/edit/{id}', [SupplierController::class, 'edit']);
Route::put('/supplier/update/{id}', [SupplierController::class, 'update']);
Route::get('/supplier/delete/{id}', [SupplierController::class, 'destroy']);

//Custommer
Route::get('/customer', [CustomerController::class, 'index']);
Route::get('/customer/create', [CustomerController::class, 'create']);
Route::post('/customer/store', [CustomerController::class, 'store']);
Route::get('/customer/edit/{id}', [CustomerController::class, 'edit']);
Route::put('/customer/update/{id}', [CustomerController::class, 'update']);
Route::get('/customer/delete/{id}', [CustomerController::class, 'destroy']);


//Department
Route::get('/department', [DepartmentController::class, 'index']);
Route::get('/department/create', [DepartmentController::class, 'create']);
Route::post('/department/store', [DepartmentController::class, 'store']);
Route::get('/department/edit/{id}', [DepartmentController::class, 'edit']);
Route::put('/department/update/{id}', [DepartmentController::class, 'update']);
Route::get('/department/delete/{id}', [DepartmentController::class, 'destroy']);


//Employment
Route::get('/employment', [EmploymentController::class, 'index']);
Route::get('/employment/create', [EmploymentController::class, 'create']);
Route::post('/employment/store', [EmploymentController::class, 'store']);
Route::get('/employment/edit/{id}', [EmploymentController::class, 'edit']);
Route::put('/employment/update/{id}', [EmploymentController::class, 'update']);
Route::get('/employment/delete/{id}', [EmploymentController::class, 'destroy']);

//Laporan
Route::get('/laporan_penjualan', [OutboundController::class, 'laporan_penjualan']);
Route::get('/cetak_laporan_penjualan/{tgl_awal}/{tgl_akhir}', [OutboundController::class, 'cetak_laporan']);
Route::get('/laporan_brg_masuk', [InboundController::class, 'laporan_brg_masuk']);
Route::get('/cetak_laporan_brg_masuk/{tgl_awal}/{tgl_akhir}', [InboundController::class, 'cetak_laporan']);
Route::get('/laporan_retur', [ReturController::class, 'laporan_retur']);
Route::get('/cetak_laporan_retur/{tgl_awal}/{tgl_akhir}', [ReturController::class, 'cetak_laporan']);
Route::get('/laporan_produk', [ProductController::class, 'laporan_produk']);
Route::get('/cetak_laporan_produk/{tgl_awal}/{tgl_akhir}', [ProductController::class, 'cetak_laporan']);