<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ContactMapController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\HeroController;
use App\Http\Controllers\Api\MediaController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\TreatmentsController;
use App\Http\Controllers\Api\WelcomeController;
use App\Http\Controllers\Api\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes (AUTH OLMADAN)
|--------------------------------------------------------------------------
*/

// Auth routes
Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

// Public content routes - Frontend için
Route::get('/hero', [HeroController::class, 'index']);
Route::get('/welcome', [WelcomeController::class, 'index']);
Route::get('/treatments', [TreatmentsController::class, 'index']);
Route::get('/contact-map', [ContactMapController::class, 'index']);
Route::get('/faq', [FaqController::class, 'index']);

// Pages Public Routes - Frontend için
Route::get('/pages/slug/{slug}', [PageController::class, 'getBySlug']);
Route::get('/pages/all', [PageController::class, 'getAllPages']);

/*
|--------------------------------------------------------------------------
| Protected Routes (AUTH GEREKLİ)
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->group(function () {

    // Auth routes
    Route::prefix('auth')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/me', [AuthController::class, 'me']);
    });

    // Dashboard routes
    Route::prefix('dashboard')->group(function () {
        Route::get('/stats', [DashboardController::class, 'stats']);
        Route::get('/recent-pages', [DashboardController::class, 'recentPages']);
        Route::get('/recent-activity', [DashboardController::class, 'recentActivity']);
    });

    // Pages Admin Routes
    Route::prefix('pages')->group(function () {
        Route::get('/', [PageController::class, 'index']);
        Route::post('/', [PageController::class, 'store']);
        Route::get('/{id}', [PageController::class, 'show']);
        Route::put('/{id}', [PageController::class, 'update']);
        Route::delete('/{id}', [PageController::class, 'destroy']);
        Route::post('/bulk-delete', [PageController::class, 'bulkDelete']);
    });

    // Media routes
    Route::prefix('media')->group(function () {
        Route::get('/', [MediaController::class, 'index']);
        Route::post('/upload', [MediaController::class, 'upload']);
        Route::get('/{id}', [MediaController::class, 'show']);
        Route::delete('/{id}', [MediaController::class, 'destroy']);
        Route::post('/bulk-delete', [MediaController::class, 'bulkDelete']);
    });

    // Settings routes
    Route::prefix('settings')->group(function () {
        Route::get('/', [SettingController::class, 'index']);

        // GET endpoints - Ayarları okuma
        Route::get('/general', [SettingController::class, 'getGeneral']);
        Route::get('/seo', [SettingController::class, 'getSeo']);
        Route::get('/social', [SettingController::class, 'getSocial']);

        // PUT endpoints - Ayarları güncelleme
        Route::put('/general', [SettingController::class, 'updateGeneral']);
        Route::put('/seo', [SettingController::class, 'updateSeo']);
        Route::put('/social', [SettingController::class, 'updateSocial']);
    });
});
