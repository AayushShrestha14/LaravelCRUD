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

Route::get('/','appController@index')->name('homepage');
Route::get('/home','appController@home')->name('home');
Route::get('/about','appController@about')->name('about');
Route::get('/contact','appController@contact')->name('contact');
Route::get('/welcome','appController@welcome')->name('welcome');
Route::get('/program','appController@program')->name('program');
Route::any('add','appController@addUser')->name('add');
Route::any('delete/{user_id?}','appController@deleteUser')->name('delete');
Route::any('edit/{user_id?}','appController@editUser')->name('edit');
Route::any('edit_action','appController@editAction')->name('edit_action');