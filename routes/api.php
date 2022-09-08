<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Film\FilmsController;
use App\Http\Controllers\Genre\GenresController;
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
Route::group(['prefix' => '/films'], function () {
    Route::get('/', [FilmsController::class, 'index']);
    Route::post('/store', [FilmsController::class, 'store']);
    Route::get('/{id}', [FilmsController::class, 'show']);
    Route::post('/{id}/update', [FilmsController::class, "update"]);
    Route::post('/{id}/publish', [FilmsController::class, "publish"]);
    Route::delete('/{id}/delete', [FilmsController::class, 'delete']);
});
Route::group(['prefix' => '/genres'], function () {
    Route::get('/', [GenresController::class, 'index']);
    Route::post('/store', [GenresController::class, 'store']);
    Route::get('/{id}', [GenresController::class, 'show']);
    Route::delete('/{id}/delete', [GenresController::class, 'delete']);
});
