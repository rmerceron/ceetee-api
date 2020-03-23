<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/shops', 'ShopController@getAll');
Route::get('/shops/{shop}', 'ShopController@findOneById');

Route::get('/shopsUser/{user}', 'UserShopController@findOneById');

Route::get('/promotions/{shop}', 'PromotionController@getPromobyShopId');
Route::post('/promotion/{shop}', 'PromotionController@createOnePromo');

Route::post('/usershops/{shop}', 'UserShopController@addOneFavory');
Route::delete('/usershops/{userShop}', 'UserShopController@deleteOneFavory');
