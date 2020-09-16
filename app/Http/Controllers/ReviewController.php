<?php

namespace App\Http\Controllers;
use App\Review; //追加
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //トップページを表示
    public function index(Request $request)
    {
        $items = Review::all();
        return view('index', ['items' => $items]);
    }
    //投稿ページを表示
    public function post(Request $request)
    {
        return('post');
    }
    //フォームの値を取得しDBにレコード挿入
    public function create(Request $request)
    {
        $this->validate($request, Review::$rules); //バリデーションの実行
        $board = new Review; //Reviewインスタンス作成
        $form = $request->all(); //送信されたフォームの値を保管
        unset($form['_token']); //CSRF非表示フィールド_token削除
        $board->fill($form)->save(); //fillメソッドでモデルのプロパティにまとめて代入
        return redirect('/'); //トップページへ
    }

}
