<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', 'PlantsController@welcome');
Route::get('/gardener', "GardenersController@index");
Route::get('/store', "PlantsController@search");
Route::get('/store/{plant}', "PlantsController@show");

Route::get('/gardener/{gardener}', "GardenersController@show");

// harus login
Route::middleware(['auth'])->group( function () { 
    // role admin/member
    Route::middleware(['role:admin|member'])->group( function(){
        
    });
    // role member
    Route::middleware(['role:member'])->group( function(){
        Route::get('/cart', "PlantCartsController@index");
        Route::get('/cart/checkout', 'PlantCartsController@checkout');

        Route::post('/plantCart/{plant}', "PlantCartsController@store");
        Route::delete('/plantCart/{plantCart}', 'PlantCartsController@destroy');
        Route::patch('/plantCart/{plantCart}', 'PlantCartsController@update');

        Route::post('/gardenerCart/{gardener}', "GardenerCartsController@store");
        Route::delete('/gardenerCart/{gardenerCart}', 'GardenerCartsController@destroy');
        Route::patch('/gardenerCart/{gardenerCart}', 'GardenerCartsController@update');
        Route::get('/history', 'TransactionHistoriesController@index');
    });
    //role admin
    Route::middleware(['role:admin'])->group( function(){
        
    });
} );




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
