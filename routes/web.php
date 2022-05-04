<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\PartnerTypeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TypicalFoodController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TouristSpotController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::resource('cidade', CidadeController::class);


Route::post('city/bootgrid', [CityController::class, 'bootgrid'])->name('city.bootgrid');
Route::resource('city', CityController::class);

Route::post('category/bootgrid', [CategoryController::class, 'bootgrid'])->name('category.bootgrid');
Route::resource('category', CategoryController::class);

Route::post('typical_food/bootgrid', [TypicalFoodController::class, 'bootgrid'])->name('typical_food.bootgrid');
Route::resource('typical_food', TypicalFoodController::class);


Route::post('image/bootgrid', [ImageController::class, 'bootgrid'])->name('image.bootgrid');
Route::resource('image', ImageController::class);

Route::post('user/bootgrid', [UserController::class, 'bootgrid'])->name('user.bootgrid');
Route::resource('user', UserController::class);


Route::resource('partner_type',PartnerTypeController::class);
Route::resource('partner', PartnerController::class);
Route::resource('event', EventController::class);
Route::resource('tourist_spot', TouristSpotController::class);

