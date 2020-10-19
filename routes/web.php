<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'ReviewController@index');

Auth::routes();

Route::get('mypage', 'MypageController@index')->name('mypage');

//投稿画面の表示
Route::get('post', 'ReviewController@post');

//投稿内容をDBへ登録 
Route::post('insert', 'ReviewController@create');

//投稿の修正、削除
Route::get('edit', 'ReviewController@edit');

//修正した投稿をDBでUPDATEする
Route::post('update', 'ReviewController@update');

//削除命令
Route::post('del', 'ReviewController@delete');

//Contact
Route::get('contact', 'ContactController@index');

// 確認ページ
//Route::post('confirm', 'ContactController@confirm')->name('confirm');

// DB挿入、メール送信
Route::post('process', 'ContactController@process');
// ->name('process');

// 完了ページ
Route::get('complete', 'ContactController@complete')->name('complete');

// タグ一覧ページ表示
Route::get('tags', 'TagController@getTags');

// ユーザー別投稿ページ表示
Route::get('user', 'ReviewController@getReviewsByUser');

//パスワード変更
Route::get('changepassword','HomeController@showChangePasswordForm');
Route::post('changepassword','HomeController@changepassword')->name('changepassword');

// タグ別投稿ページ表示
Route::get('tag', 'TagController@getReviewsByTag')->name('tag');

// 利用規約ページ表示
Route::get('terms', 'TermsController@index'); //URL, Controller@method

// ログアウト
Route::get('/logout',[
    'uses' => 'UserController@getLogout',
    'as' => 'user.logout'
    ]);
//検索
Route::get('search', 'SearchController@search')->name('search');

