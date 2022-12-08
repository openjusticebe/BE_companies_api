<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ApiEnterpriseController;
use App\Http\Controllers\Api\ApiNaceController;
use App\Http\Controllers\Api\BaseController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// define name api.index
Route::get('/', [BaseController::class, 'index'])->name('api.index');


Route::get('/enterprises/random/', [ApiEnterpriseController::class, 'random'])->name('enterprises.random');

// lookup
Route::get('/enterprises/lookup/', [ApiEnterpriseController::class, 'lookup'])->name('enterprises.lookup');

Route::get('/enterprises/{EnterpriseNumber}', [ApiEnterpriseController::class, 'show'])->name('enterprises.show');

Route::get('/enterprises/{EnterpriseNumber}/digest', [ApiEnterpriseController::class, 'showDigest'])->name('enterprises.showDigest');

Route::get('/naces/{naceArray}', [ApiNaceController::class, 'get'])->name('naces.get');
