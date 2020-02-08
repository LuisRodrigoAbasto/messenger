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

Auth::routes();

Route::get('/chat', 'ChatController@index')->name('chat');
Route::get('/chat/{conversacion_id}', 'ChatController@index');
Route::get('/profile', 'ProfileController@edit');
Route::post('/profile', 'ProfileController@update');

Route::get('/api/conversaciones', 'ConversacioneController@index');
Route::get('/api/mensajes', 'MensajeController@index');
Route::post('/api/mensajes', 'MensajeController@store');

