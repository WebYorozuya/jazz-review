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

// ----- ユーザー周り -----
Auth::routes();

// ユーザー別投稿ページ表示
Route::get('user', 'ReviewController@getReviewsByUser');

//パスワード変更
Route::get('changepassword','MypageController@showChangePasswordForm');
Route::post('changepassword','MypageController@changepassword')->name('changepassword');

Route::get('mypage', 'MypageController@index')->name('mypage');

// ログアウト
Route::get('/logout',[
    'uses' => 'UserController@getLogout',
    'as' => 'user.logout'
    ]);

    //プロフ画像
Route::get('/upload','UploadImageController@input')->name('upload_form');
Route::post('/upload','UploadImageController@upload')->name('upload_image');
Route::get('/output','UploadImageController@output')->name('output');

// ----- 投稿周り -----
Route::get('/', 'ReviewController@index');

//投稿画面の表示
Route::get('post', 'ReviewController@post');

//投稿内容をDBへ登録 
Route::post('insert', 'ReviewController@create');

//投稿の修正、削除ページの表示
Route::get('edit', 'ReviewController@edit');

//修正
Route::post('update', 'ReviewController@update');

//削除
Route::post('del', 'ReviewController@delete');

//いいね
Route::group(['middleware' => ['auth']], function () {
    Route::post('like', 'ReviewController@like')->name('reviews.like');
});

// タグ一覧ページ表示
Route::get('tags', 'TagController@getTags');

// タグ別投稿ページ表示
Route::get('tag', 'TagController@getReviewsByTag')->name('tag');

//検索
Route::get('search', 'SearchController@search')->name('search');

// ----- その他 -----
// 利用規約ページ表示
Route::get('terms', 'TermsController@index'); 

//Contact
Route::get('contact', 'ContactController@index');

// DB挿入、メール送信
Route::post('process', 'ContactController@process');
