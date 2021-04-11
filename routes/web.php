<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/user', function () {
    return view('user');
});
Route::get('card', 'CardController@index');

Route::post('card/store', 'CardController@store');
Route::get('card/edit/{id}', 'CardController@edit');
Route::post('card/update/{id}', 'CardController@update');
Route::get('card/{id}', 'CardController@show');