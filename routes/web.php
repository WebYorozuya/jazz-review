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

// Route::get('/', function () {
//     return view('index');
// });
//トップページの呼び出し。PostControllerのindexを呼び出す postではなくgetだ
Route::get('/', 'PostController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//投稿画面の表示
Route::get('post', 'PostController@post');

//投稿内容をDBへ登録
Route::post('insert', 'PostController@create');

