<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\TreatmentController;
use App\Http\Controllers\Api\MenuController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['api.public'])
    ->group(function () {
        Route::get('pages/home', [PageController::class,'home']);
        Route::get('pages/{slug}', [PageController::class,'show'])->where('slug','.*');
        Route::get('treatments', [TreatmentController::class,'index']);
        Route::get('treatments/{slug}', [TreatmentController::class,'show'])->where('slug','.*');
        Route::get('slugs', [PageController::class,'slugs']);
    });
Route::middleware(['api.public','api.cache'])->group(function () {
});
Route::get('pages/home', [PageController::class,'home']);
Route::get('pages/{slug}', [PageController::class,'show'])->where('slug','.*');
Route::get('slugs', [PageController::class,'slugs']);

Route::get('treatments', [TreatmentController::class,'index']);
Route::get('treatments/{slug}', [TreatmentController::class,'show'])->where('slug','.*');
Route::get('menus/main', [MenuController::class,'main']);
