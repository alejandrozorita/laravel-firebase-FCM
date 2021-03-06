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
    return view('welcome');
});


Route::get('notificaciones-push',[
    'as' => 'notificacion',
    'uses' => 'PushController@index',
]);

Route::get('notificaciones-push/multiple',[
    'as' => 'multiple_device',
    'uses' => 'PushController@multiple_device',
]);

Route::get('notificaciones-push/notificacion',[
    'as' => 'notificacion',
    'uses' => 'PushController@notificacion',
]);