<?php

Auth::routes();
// Route::get('/', 'ArticleController@index');
// Route::resource('/articles', 'ArticleController');

Route::get('/', 'ArticleController@index')->name('articles.index');
// indexをrootにしているので名前を付ける
Route::resource('/articles', 'ArticleController')->except(['index'])->middleware('auth'); 
// indexはルートに使っているので除外する


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

// Route::get('/', function () {
//     return view('welcome');
// });

