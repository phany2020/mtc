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

Route::group(['prefix' => 'settings'], function () {
    Route::get('/', 'SettingController@index');
    Route::post('/', 'SettingController@create');
    Route::get('/{id}', 'SettingController@find');
    Route::match(['post', 'put'], '/{id}', 'SettingController@update');
    Route::delete('/{id}', 'SettingController@destroy');
});


Route::group(['prefix' => 'applications'], function () {
    Route::get('/', 'ApplicationController@index');
    Route::post('/', 'ApplicationController@create');
    Route::get('/{id}', 'ApplicationController@find');
    Route::match(['post', 'put'], '/{id}', 'ApplicationController@update');
    Route::delete('/{id}', 'ApplicationController@destroy');
});


Route::group(['prefix' => 'clients'], function () {
    Route::get('/', 'ClientController@index');
    Route::post('/', 'ClientController@create');
    Route::get('/{id}', 'ClientController@find');
    Route::match(['post', 'put'], '/{id}', 'ClientController@update');
    Route::delete('/{id}', 'ClientController@destroy');
});


Route::group(['prefix' => 'donations'], function () {
    Route::get('/', 'DonationController@index');
    Route::post('/', 'DonationController@create');
    Route::get('/{id}', 'DonationController@find');
    Route::match(['post', 'put'], '/{id}', 'DonationController@update');
    Route::delete('/{id}', 'DonationController@destroy');
});


Route::group(['prefix' => 'guides'], function () {
    Route::get('/', 'GuideController@index');
    Route::post('/', 'GuideController@create');
    Route::get('/{id}', 'GuideController@find');
    Route::match(['post', 'put'], '/{id}', 'GuideController@update');
    Route::delete('/{id}', 'GuideController@destroy');
});


Route::group(['prefix' => 'hotels'], function () {
    Route::get('/', 'HotelController@index');
    Route::post('/', 'HotelController@create');
    Route::get('/{id}', 'HotelController@find');
    Route::match(['post', 'put'], '/{id}', 'HotelController@update');
    Route::delete('/{id}', 'HotelController@destroy');
});


Route::group(['prefix' => 'news'], function () {
    Route::get('/', 'NewsController@index');
    Route::post('/', 'NewsController@create');
    Route::get('/{id}', 'NewsController@find');
    Route::match(['post', 'put'], '/{id}', 'NewsController@update');
    Route::delete('/{id}', 'NewsController@destroy');
});


Route::group(['prefix' => 'tourism_types'], function () {
    Route::get('/', 'TourismTypeController@index');
    Route::post('/', 'TourismTypeController@create');
    Route::get('/{id}', 'TourismTypeController@find');
    Route::match(['post', 'put'], '/{id}', 'TourismTypeController@update');
    Route::delete('/{id}', 'TourismTypeController@destroy');
});


Route::group(['prefix' => 'sites'], function () {
    Route::get('/', 'SiteController@index');
    Route::post('/', 'SiteController@create');
    Route::get('/{id}', 'SiteController@find');
    Route::match(['post', 'put'], '/{id}', 'SiteController@update');
    Route::delete('/{id}', 'SiteController@destroy');
});


Route::group(['prefix' => 'receptionnists'], function () {
    Route::get('/', 'ReceptionnistController@index');
    Route::post('/', 'ReceptionnistController@create');
    Route::get('/{id}', 'ReceptionnistController@find');
    Route::match(['post', 'put'], '/{id}', 'ReceptionnistController@update');
    Route::delete('/{id}', 'ReceptionnistController@destroy');
});


Route::group(['prefix' => 'messages'], function () {
    Route::get('/', 'MessageController@index');
    Route::post('/', 'MessageController@create');
    Route::get('/{id}', 'MessageController@find');
    Route::match(['post', 'put'], '/{id}', 'MessageController@update');
    Route::delete('/{id}', 'MessageController@destroy');
});


Route::group(['prefix' => 'news_sites'], function () {
    Route::get('/', 'NewsSitesController@index');
    Route::post('/', 'NewsSitesController@create');
    Route::get('/{id}', 'NewsSitesController@find');
    Route::match(['post', 'put'], '/{id}', 'NewsSitesController@update');
    Route::delete('/{id}', 'NewsSitesController@destroy');
});


Route::group(['prefix' => 'guides_tourism_types'], function () {
    Route::get('/', 'GuidesTourismTypesController@index');
    Route::post('/', 'GuidesTourismTypesController@create');
    Route::get('/{id}', 'GuidesTourismTypesController@find');
    Route::match(['post', 'put'], '/{id}', 'GuidesTourismTypesController@update');
    Route::delete('/{id}', 'GuidesTourismTypesController@destroy');
});


/*Route::group(['prefix' => 'guides_tourism_types'], function () {
    Route::get('/', 'GuidesTourismTypesController@index');
    Route::post('/', 'GuidesTourismTypesController@create');
    Route::get('/{id}', 'GuidesTourismTypesController@find');
    Route::match(['post', 'put'], '/{id}', 'GuidesTourismTypesController@update');
    Route::delete('/{id}', 'GuidesTourismTypesController@destroy');
});*/


Route::group(['prefix' => 'clients_tourism_types'], function () {
    Route::get('/', 'ClientsTourismTypesController@index');
    Route::post('/', 'ClientsTourismTypesController@create');
    Route::get('/{id}', 'ClientsTourismTypesController@find');
    Route::match(['post', 'put'], '/{id}', 'ClientsTourismTypesController@update');
    Route::delete('/{id}', 'ClientsTourismTypesController@destroy');
});
