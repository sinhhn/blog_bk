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

Route::get('/about', 'PageControllers@getAbout');

Route::get('/contact', 'PageControllers@getContact');

Route::get('/', 'PageControllers@getIndex');

Route::resource('posts', 'PostController');