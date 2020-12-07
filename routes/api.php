<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ReturController;
use App\Http\Controllers\InboundController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OutboundController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\RoadblockController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmploymentController;
use App\Http\Controllers\OutboundDetailController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['prefix'=> 'v1'], function()
{
   Route::resource('po', PoController::class,[
    'except' => ['show']
   ]);
   
   Route::resource('type', TypeController::class,[
      'except' => ['show']
   ]);
   
   Route::resource('product', ProductController::class,[
      'except' => ['show']
   ]);
   Route::resource('penjualan', OutboundDetailController::class, [
      'except' => ['show']
   ]);
   Route::resource('outbound', OutboundController::class,[
      'except' => ['edit']
   ]);
   Route::resource('retur', ReturController::class,[
      'only' => ['index','store']
   ]);

   Route::resource('roadblock', RoadblockController::class,[
     'only'=> ['index', 'store']
   ]);

   Route::resource('department', DepartmentController::class,[
     'except'=> ['show']
   ]);

   Route::resource('employment', EmploymentController::class,[
   //   'except'=> ['show']
   ]);

   Route::resource('customer', CustomerController::class,[
     'except'=> ['show']
   ]);

   Route::resource('supplier', SupplierController::class,[
     'except'=> ['show']
   ]);

   //Laporan
   Route::get('/cetak_laporan_penjualan/{tgl_awal}/{tgl_akhir}', [OutboundController::class, 'cetak_laporan']);

   Route::get('/cetak_laporan_brg_masuk/{tgl_awal}/{tgl_akhir}', [InboundController::class, 'cetak_laporan']);
   Route::get('/cetak_laporan_retur/{tgl_awal}/{tgl_akhir}', [ReturController::class, 'cetak_laporan']);
   // Route::get('/cetak_laporan_produk/{tgl_awal}/{tgl_akhir}', [ProductController::class, 'cetak_laporan']);
   Route::get('/cetak_laporan_produk_mingguan', [ProductController::class, 'cetak_laporan_mingguan']);
   Route::get('/cetak_laporan_produk_bulanan', [ProductController::class, 'cetak_laporan_bulanan']);
   Route::get('/cetak_laporan_produk_tahunan', [ProductController::class, 'cetak_laporan_tahunan']);

   //LOgin 
   Route::post('/login',[AuthController::class, 'login']);

}); 