<?php

namespace App\Http\Controllers;
use App\Review; //追加
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //ログインユーザ情報取得用に追加
use App\Tag; //タグ用に追加

class ReviewController extends Controller
{
    //トップページを表示
    public function index(Request $request)
    {
        $items = Review::orderBy('id', 'desc')
        ->paginate(10); //reviewsテーブルから取得
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
        return view('review.post', ['user' => $user]);
    }
    //フォームの値を取得しDBにレコード挿入
    public function create(Request $request)
    {
        $this->validate($request, Review::$rules); //バリデーションの実行
        $review = new Review; //Reviewインスタンス作成
        $form = $request->all(); //送信されたフォームの値を保管
        unset($form['_token']); //CSRF非表示フィールド_token削除
        $review->fill($form)->save(); //fillメソッドでモデルのプロパティにまとめて代入

        $this->validate($request, Tag::$rules); //バリデーションの実行
        $tag = new Tag; //Reviewインスタンス作成
        $form = $request->all(); //送信されたフォームの値を保管
        unset($form['_token']); //CSRF非表示フィールド_token削除
        $tag->fill($form)->save(); //fillメソッドでモデルのプロパティにまとめて代入

        return redirect('/'); //トップページへ
    }
    //投稿修正機能
    public function modify(Request $request)
    {
        $review = Review::find($request->id);
        return view('review.modify', ['form' => $review]);
    }
    //投稿修正送信
    public function update(Request $request)
    {
        $this->validate($request, Review::$rules); //バリデーションの実行
        $review = Review::find($request->id); //Reviewインスタンス作成
        $form = $request->all(); //送信されたフォームの値を保管
        unset($form['_token']); //CSRF非表示フィールド_token削除
        $review->fill($form)->save(); //fillメソッドでモデルのプロパティにまとめて代入
        return redirect('/'); //トップページへ
    }
    //投稿削除
    public function delete(Request $request)
    {
        Review::find($request->id)->delete();
        return redirect('/');
    }
}
