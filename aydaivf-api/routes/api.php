<?php

use App\Http\Controllers\Api\CmsWelcomeController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\FooterController;
use App\Http\Controllers\Api\HeroController;
use App\Http\Controllers\Api\OurSuccessRatesController;
use App\Http\Controllers\Api\OurTeamController;
use App\Http\Controllers\Api\SiteController;
use App\Http\Controllers\Api\TravelController;
use App\Http\Controllers\Api\TreatmentsSectionController;
use App\Http\Controllers\Api\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\TreatmentController;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\WhyUsController;
use App\Http\Controllers\Api\ShowcaseController;
use App\Http\Controllers\Api\OurPricesController;

Route::middleware(['api.public'])->group(function () {
    // Pages
    Route::get('pages/home',   [PageController::class, 'home']);
    Route::get('pages/{slug}', [PageController::class, 'show'])->where('slug', '.*');
    Route::get('our-team', [OurTeamController::class, 'show']); // /api/our-team
    Route::get('our-success-rates', [OurSuccessRatesController::class, 'show']);
    Route::get('faq', [FaqController::class, 'index']);   // /api/faq?lang=tr
    Route::get('travel', [TravelController::class, 'index']); // /api/travel?lang=tr
    Route::get('contact',  [ContactController::class, 'show']);   // /api/contact?lang=tr
    Route::post('contact', [ContactController::class, 'submit']);
    Route::get('why-us', WhyUsController::class);
    Route::get('/hero',     [PageController::class,'hero']);      // << şema fix
    Route::get('/welcome',  [PageController::class,'welcome']);
    Route::get('/treatments-section', [PageController::class, 'treatmentsSection']);

    // Slugs
    Route::get('slugs', [PageController::class, 'slugs']);

    // Treatments
    Route::get('treatments',        [TreatmentController::class, 'index']);
    Route::get('treatments/{slug}', [TreatmentController::class, 'show'])->where('slug', '.*');

    // Menu
    Route::get('menus/main', [MenuController::class, 'main']);

    // Standalone API (frontend bunları çağırıyor)
    Route::get('hero',                [HeroController::class, 'show']);             // /api/hero
    Route::get('welcome',             [WelcomeController::class, 'get']);           // /api/welcome
    Route::get('treatments-section',  [TreatmentsSectionController::class, 'index']); // /api/treatments-section
    Route::get('showcase',            [ShowcaseController::class, 'index']);        // /api/showcase
    Route::get('footer',              [FooterController::class, 'index']);          // /api/footer
    Route::get('why-us',              WhyUsController::class);                      // /api/why-us

    // Our Prices
    Route::get('our-prices',          [OurPricesController::class, 'show']);        // /api/our-prices
});

// MENUS
Route::get('/menus/main', [MenuController::class, 'main']);
Route::get('/menus/{key}', [MenuController::class, 'show']);
Route::get('why-us', WhyUsController::class);
Route::get('/footer', [FooterController::class, 'show']);
Route::get('/welcome', [CmsWelcomeController::class, 'show']);
Route::get('/treatments-section', [TreatmentsSectionController::class, 'show']);
Route::get('/showcase', [ShowcaseController::class, 'index']);
Route::get('/footer', [SiteController::class, 'footer']);
Route::get('/our-prices', [OurPricesController::class, 'show']);
