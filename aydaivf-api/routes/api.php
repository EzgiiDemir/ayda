<?php

use App\Http\Controllers\Api\FooterController;
use App\Http\Controllers\Api\HeroController;
use App\Http\Controllers\Api\TreatmentsSectionController;
use App\Http\Controllers\Api\WelcomeController;
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
| Burada uygulamanın tüm API route’larını tanımlarsın.
| Bu dosyadaki route’lar otomatik olarak "api" prefix’i ile yüklenir.
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['api.public'])->group(function () {
    // ---- PAGE ROUTES ----
    Route::get('pages/home', [PageController::class, 'home']);
    Route::get('pages/hero', [PageController::class, 'hero']);
    Route::get('pages/{slug}', [PageController::class, 'show'])->where('slug', '.*');

    // ---- SLUG LIST ----
    Route::get('slugs', [PageController::class, 'slugs']);

    // ---- TREATMENTS ----
    Route::get('treatments', [TreatmentController::class, 'index']);
    Route::get('treatments/{slug}', [TreatmentController::class, 'show'])->where('slug', '.*');
});

// ---- MENU ----
Route::get('menus/main', [MenuController::class, 'main']);
Route::get('/menus/{key}', [MenuController::class, 'show']);

Route::prefix('pages')->group(function () {
    Route::get('/home', [PageController::class, 'home']);
    Route::get('/hero', [PageController::class, 'hero']);
    Route::get('/welcome', [PageController::class, 'welcome']); // <-- BUNU EKLE
    Route::get('/{slug}', [PageController::class, 'show'])->where('slug', '.*');
});
Route::get('/hero', [HeroController::class, 'show']);
Route::get('/welcome', [WelcomeController::class, 'get']);
Route::get('/treatments-section',[App\Http\Controllers\Api\TreatmentsSectionController::class,'show']);
Route::get('/treatments-section', [\App\Http\Controllers\Api\TreatmentsSectionController::class, 'index']);
Route::get('/showcase', [\App\Http\Controllers\Api\ShowcaseController::class, 'index']);
Route::get('/footer', [FooterController::class, 'index']);
