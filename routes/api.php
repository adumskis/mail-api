<?php

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

Route::middleware(['auth:api'])->group(function () {
    Route::get('messages', ['as' => 'api.message.index', 'uses' => 'Api\MessageController@index']);
    Route::get('messages/archived', ['as' => 'api.message.archived', 'uses' => 'Api\MessageController@archived']);
    Route::get('message/{uid}', ['as' => 'api.message.show', 'uses' => 'Api\MessageController@show']);
    Route::get('message/{uid}/read', ['as' => 'api.message.read', 'uses' => 'Api\MessageController@read']);
    Route::get('message/{uid}/archive', ['as' => 'api.message.archive', 'uses' => 'Api\MessageController@archive']);

});
