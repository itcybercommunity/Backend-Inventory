<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PoController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ProductController;

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
}); 