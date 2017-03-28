<?php

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
    return view('telegram');
});

Route::get('/get-updates', [
    'as' => 'get.index',
    'uses' => 'TelegramController@getUpdates'
]);

Route::get('send',  'TelegramController@getSendMessage');
Route::post('send', 'TelegramController@postSendMessage');
