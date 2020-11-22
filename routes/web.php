<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
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

//user削除（論理的削除)
Route::get('destroy', 'UserController@index')->name('destroy');
Route::delete('destroy','UserController@destroy')->name('destroy');

//パスワード変更
Route::get('/changepassword','SettingController@showChangePasswordForm');
Route::post('/changepassword','SettingController@changepassword')->name('changepassword');

//ユーザー設定画面
Route::get('/settings', 'SettingController@index')->name('settings');

// ログアウト
Route::get('/logout',[
    'uses' => 'UserController@getLogout',
    'as' => 'user.logout'
    ]);

//プロフ画像
Route::get('/upload','UploadImageController@input')->name('upload_form');
Route::post('/upload','UploadImageController@storeS3')->name('upload_image');
Route::get('/output','UploadImageController@output')->name('output');

// ----- 投稿周り -----
Route::get('/', 'ReviewController@index')->name('top');

//投稿画面の表示
Route::get('/post', function() {
    return view('reviews.post');
})->name('post');

//タグのサジェスト
Route::get('/get_suggested_tag', 'TagController@getSuggestedTag');

//投稿内容をDBへ登録
Route::post('/insert', 'ReviewController@create');

//投稿の修正、削除ページの表示
Route::get('/edit', 'ReviewController@edit')->name('edit');

//修正
Route::post('/update', 'ReviewController@update');

//削除
Route::post('/del', 'ReviewController@delete');

//いいね
Route::post('/like', 'ReviewController@like')->name('reviews.like');

// タグ一覧ページ表示
Route::get('/tags', 'TagController@getTags')->name('tags');

// タグ別投稿ページ表示
Route::get('/tag/{tag_name}', 'TagController@getReviewsByTag')->name('tags.tag');

// ユーザー別投稿ページ表示
Route::get('/user', 'ReviewController@getReviewsByUser')->name('user');

//検索
Route::get('/search', 'SearchController@search')->name('search');

// ----- その他 -----
//Contact
Route::get('/contact', function() {
    return view('contact.contact');
})->name('contact');

// 利用規約ページ表示
Route::get('/terms', 'TermsController@index');

// 問合せメール送信
Route::post('/process', 'ContactController@process');
