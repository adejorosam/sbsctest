<?php

use Illuminate\Http\Request;

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

Route::group(['prefix' => 'auth', 'middleware' => ['forceJson']], function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
});

Route::apiResource('categories', 'CategoryController');
Route::apiResource('products', 'ProductController');
Route::get('factoryProducts','ProductController@makeFiftyProducts');
Route::get('exportCSV','ProductController@exportCSV');
Route::get('exportExcel','ProductController@exportExcel');
Route::get('factorial', 'AlgorithmsController@factorialof13');
Route::post('searchinsert', 'AlgorithmsController@searchInsert');
Route::post('sortstates', 'AlgorithmsController@sortArrValue');