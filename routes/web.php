<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\PartnerTypeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TypicalFoodController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TouristSpotController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\frontend\HomeSiteController;
use App\Http\Controllers\frontend\FrontendPartnerController;
use App\Http\Controllers\frontend\FrontendEventController;
use App\Http\Controllers\frontend\FrontendTypicalFoodController;
use App\Http\Controllers\frontend\FrontendTouristSpotController;

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

Route::get('/', [HomeSiteController::class, 'index'])->name('web.index');
Route::get('/parceiro/{partner}', [FrontendPartnerController::class, 'show'])->name('web.partner.show');
Route::get('/parceiro', [FrontendPartnerController::class, 'index'])->name('web.partner');
Route::get('/evento/mapa', [FrontendEventController::class, 'map'])->name('web.event.map');
Route::get('/evento/{event}', [FrontendEventController::class, 'show'])->name('web.event.show');
Route::get('/evento', [FrontendEventController::class, 'index'])->name('web.event');
Route::get('/comida-tipica/{typical_food}', [FrontendTypicalFoodController::class, 'show'])->name('web.typicalfood.show');
Route::get('/comida-tipica', [FrontendTypicalFoodController::class, 'index'])->name('web.typicalfood');
Route::get('/ponto-turistico/{tourist_spot}', [FrontendTouristSpotController::class, 'show'])->name('web.touristspot.show');
Route::get('/ponto-turistico', [FrontendTouristSpotController::class, 'index'])->name('web.touristspot');
Route::get('/contact', [ContactController::class, 'index'])->name('web.contact.index');
Route::resource('/contact',ContactController::class);

Route::get('/quem-somos', [\App\Http\Controllers\frontend\AboutController::class, 'index'])->name('web.about');

Auth::routes();


Route::prefix('admin')->middleware('auth')->group(function(){
    Route::get('/', function() {
        return view('home');
    })->name('home');


    Route::post('partner/bootgrid', [PartnerController::class, 'bootgrid'])->name('partner.bootgrid');
    Route::get('partner/image', [PartnerController::class, 'image'])->name('partner.image');
    Route::get('partner/uploadimage/{partner_id?}', [PartnerController::class, 'uploadImageGet'])->name('partner.uploadImageGet');
    Route::post('partner/uploadimage/{partner_id?}', [PartnerController::class, 'uploadImagePost'])->name('partner.uploadImagePost');
    Route::put('partner/uploadimage/{partner_id?}', [PartnerController::class, 'uploadImagePost'])->name('partner.uploadImagePost');
    Route::delete('partner/uploadimage/{partner_id?}', [PartnerController::class, 'uploadImageDelete'])->name('partner.uploadImageDelete');
    Route::resource('partner', PartnerController::class);



    Route::post('city/bootgrid', [CityController::class, 'bootgrid'])->name('city.bootgrid');
    Route::resource('city', CityController::class);

    Route::post('partner_type/bootgrid', [PartnerTypeController::class, 'bootgrid'])->name('partner_type.bootgrid');
    Route::resource('partner_type',PartnerTypeController::class);

    Route::post('category/bootgrid', [CategoryController::class, 'bootgrid'])->name('category.bootgrid');
    Route::resource('category', CategoryController::class);

    Route::get('typical_food/image', [TypicalFoodController::class, 'image'])->name('typical_food.image');
    Route::get('typical_food/uploadimage/{typical_food_id?}', [TypicalFoodController::class, 'uploadImageGet'])->name('typical_food.uploadImageGet');
    Route::post('typical_food/uploadimage/{typical_food_id?}', [TypicalFoodController::class, 'uploadImagePost'])->name('typical_food.uploadImagePost');
    Route::put('typical_food/uploadimage/{typical_food_id?}', [TypicalFoodController::class, 'uploadImagePost'])->name('typical_food.uploadImagePost');
    Route::delete('typical_food/uploadimage/{typical_food_id?}', [TypicalFoodController::class, 'uploadImageDelete'])->name('typical_food.uploadImageDelete');
    Route::post('typical_food/bootgrid', [TypicalFoodController::class, 'bootgrid'])->name('typical_food.bootgrid');
    Route::resource('typical_food', TypicalFoodController::class);

    Route::post('user/bootgrid', [UserController::class, 'bootgrid'])->name('user.bootgrid');
    Route::resource('user', UserController::class);

    Route::get('event/image', [EventController::class, 'image'])->name('event.image');
    Route::get('event/uploadimage/{event_id?}', [EventController::class, 'uploadImageGet'])->name('event.uploadImageGet');
    Route::post('event/uploadimage/{event_id?}', [EventController::class, 'uploadImagePost'])->name('event.uploadImagePost');
    Route::put('event/uploadimage/{event_id?}', [EventController::class, 'uploadImagePost'])->name('event.uploadImagePost');
    Route::delete('event/uploadimage/{event_id?}', [EventController::class, 'uploadImageDelete'])->name('event.uploadImageDelete');

    Route::post('event/bootgrid', [EventController::class, 'bootgrid'])->name('event.bootgrid');
    Route::resource('event', EventController::class);

    Route::get('tourist_spot/image', [TouristSpotController::class, 'image'])->name('tourist_spot.image');
    Route::get('tourist_spot/uploadimage/{tourist_spot_id?}', [TouristSpotController::class, 'uploadImageGet'])->name('tourist_spot.uploadImageGet');
    Route::post('tourist_spot/uploadimage/{tourist_spot_id?}', [TouristSpotController::class, 'uploadImagePost'])->name('tourist_spot.uploadImagePost');
    Route::put('tourist_spot/uploadimage/{tourist_spot_id?}', [TouristSpotController::class, 'uploadImagePost'])->name('tourist_spot.uploadImagePost');
    Route::delete('tourist_spot/uploadimage/{tourist_spot_id?}', [TouristSpotController::class, 'uploadImageDelete'])->name('tourist_spot.uploadImageDelete');
    Route::post('tourist_spot/bootgrid', [TouristSpotController::class, 'bootgrid'])->name('tourist_spot.bootgrid');
    Route::resource('tourist_spot', TouristSpotController::class);

    Route::get('settings', [UserController::class, 'getProfile'])->name('profile.index');
    Route::post('settings', [UserController::class, 'postProfile'])->name('profile.save');

    Route::get('password', [UserController::class, 'getPassword'])->name('password.index');
    Route::post('password', [UserController::class, 'postPassword'])->name('password.save');


});

