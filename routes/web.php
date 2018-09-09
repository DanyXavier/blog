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

//
Route::redirect('/', '/', 301);

Auth::routes();

Route::get('/', 'pageController@index')->name('/');
Route::get('entrada/{slug}','pageController@post')->name('post');
Route::get('categoria/{slug}','pageController@category')->name('category');
Route::get('etiqueta/{slug}','pageController@slug')->name('slug');
Route::resource('tags', 'Admin\TagController',['except'=>'edit']);



