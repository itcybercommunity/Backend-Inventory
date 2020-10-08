<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DepartmentController;

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

//Suplier
Route::get('/supplier', [SupplierController::class, 'index']);
Route::get('/supplier/create', [SupplierController::class, 'create']);
Route::post('/supplier/store', [SupplierController::class, 'store']);
Route::get('/supplier/edit/{id}', [SupplierController::class, 'edit']);
Route::put('/supplier/update/{id}', [SupplierController::class, 'update']);
Route::get('/supplier/delete/{id}', [SupplierController::class, 'destroy']);
