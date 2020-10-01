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

//トップページの呼び出し
//Route::get('/', 'PostController@index');
//model追加
Route::get('/', 'ReviewController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//投稿画面の表示
//Route::get('post', 'PostController@post');
Route::get('post', 'ReviewController@post');

//投稿内容をDBへ登録 
//Route::post('insert', 'PostController@create');モデル使用により修正
Route::post('insert', 'Reviewontroller@create');

//投稿の修正、削除
Route::get('modify', 'ReviewController@modify');

//修正した投稿をDBでUPDATEする
Route::post('update', 'ReviewController@update');

//削除命令
Route::post('del', 'ReviewController@delete');

//Contact
Route::get('contact', 'ContactController@index');

// 確認ページ
Route::post('confirm', 'ContactController@confirm')->name('confirm');

// DB挿入、メール送信
Route::post('process', 'ContactController@process');
// ->name('process');

// 完了ページ
Route::get('complete', 'ContactController@complete')->name('complete');

// タグページ表示
Route::get('tags', 'TagController@index');

// ユーザー別投稿ページ表示
Route::get('user', 'ReviewController@userposts');
// Route::get('user?name={{$user}}', 'ReviewController@user');

//パスワード変更
Route::get('changepassword','HomeController@showChangePasswordForm');
Route::post('changepassword','HomeController@changepassword')->name('changepassword');
