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
    Route::post('register', 'Api\AuthController@register');
    Route::post('login', 'Api\AuthController@login');
    Route::post('logout', 'Api\AuthController@logout');
});

Route::apiResource('categories', 'Api\CategoryController');
Route::apiResource('products', 'Api\ProductController');
Route::get('factoryProducts','Api\ProductController@makeFiftyProducts');
Route::get('exportCSV','Api\ProductController@exportCSV');
Route::get('exportExcel','Api\ProductController@exportExcel');
Route::get('factorial', 'Api\AlgorithmsController@factorialof13');
Route::post('searchinsert', 'Api\AlgorithmsController@searchInsert');
Route::post('sortstates', 'Api\AlgorithmsController@sortArrayValues');
Route::post('groupanagrams', 'Api\AlgorithmsController@groupAnagrams');

Route::post('/password/email', 'Api\ForgotPasswordController@sendResetLinkEmail')->name('password.reset');
Route::post('/password/reset', 'Api\ResetPasswordController@reset');
