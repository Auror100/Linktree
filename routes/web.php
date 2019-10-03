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

use App\Http\Controllers\LinkController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/links','LinkController@index');

Route::post('/mural','LinkController@store');
//Colocamos o id pois id foi requisitado no FindOrFail

Route::patch('/mural/{e}','LinkController@update');

Route::delete('/mural/{e}','LinkController@destroy');

Route::get('/settings','SettingsController@showSettings');

Route::patch('/settings','SettingsController@updateSettings');



Route::get('/conta/{username}','ContaController@indexConta');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
