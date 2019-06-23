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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['middleware' => 'api' , 'namespace' => 'Api' , 'prefix' => 'auth'] , function () {

    Route::POST('authenticate' , 'AuthController@authenticate')->name('api.authenticate');
    Route::POST('register' , 'AuthController@register')->name('api.register');
});

Route::group(['middleware' => ['api'] , 'namespace' => 'Api' , 'prefix' => 'index'] , function () {
    Route::GET('/' , 'IndexController@index')->name('api.index');
});

