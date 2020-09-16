<?php

namespace App\Http\Controllers;
use App\Review; //追加
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //ログインユーザ情報取得用に追加

class ReviewController extends Controller
{
    //トップページを表示
    public function index(Request $request)
    {
        $items = Review::all(); //reviewsテーブルから取得
        if (Auth::user()) { //ログインユーザ情報取得
            $user = Auth::user()->name;
        } else {
            $user = 'ゲスト';
        }
        return view('index', ['items' => $items, 'user' => $user]);
    }
    //投稿ページを表示
    public function post(Request $request)
    {
        if (Auth::user()) { //ログインユーザ情報取得
            $user = Auth::user();
        } else {
            $user = 'ゲスト';
        }
        return view('post', ['user' => $user]);
    }
    //フォームの値を取得しDBにレコード挿入
    public function create(Request $request)
    {
        $this->validate($request, Review::$rules); //バリデーションの実行
        $review = new Review; //Reviewインスタンス作成
        $form = $request->all(); //送信されたフォームの値を保管
        unset($form['_token']); //CSRF非表示フィールド_token削除
        $review->fill($form)->save(); //fillメソッドでモデルのプロパティにまとめて代入
        return redirect('/'); //トップページへ
    }

}
