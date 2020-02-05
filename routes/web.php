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

Route::get('/', 'HomeController@index')->name('index');
Route::get('/post', 'HomeController@post')->name('post');

Route::get('/register', 'RegisterNewController@register')->name('register');
Route::post('/register', 'RegisterNewController@registerProcess');
