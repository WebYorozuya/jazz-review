<?php

namespace App\Http\Controllers;

use App\Review; //追加
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //ログインユーザ情報取得用に追加
use App\Tag; //タグ用に追加
use App\User; //タグ用に追加

class ReviewController extends Controller
{
    //トップページを表示
    public function index(Request $request)
    {
        $items = Review::orderBy('id', 'desc')
        ->paginate(10); //reviewsテーブルから取得
        if (Auth::user()) { //ログインユーザ情報取得
            $user = Auth::user();
        } else {
            $user = 'ゲスト';
        }
        // return view('index', ['items' => $items, 'user' => $user]);下に書き換え
        $param = ['items' => $items, 'user' => $user];
        return view('index', $param);
    }
    //ユーザー別投稿ページを表示
    public function userposts(Request $request)
    {
        //$items = Review::where('user_id', $request->user_id)->get();//これだとpeginate追加できないのはなぜ？
        $items = Review::where('user_id', $request->user_id)->orderBy('id', 'desc')->paginate(10);//pegination要追加
        if (Auth::user()) { //ログインユーザ情報取得
            $user = Auth::user();
        } else {
            $user = 'ゲスト';
        }
        $username = User::where('id', $request->user_id)->get('name');
        return view('userposts', ['items' => $items, 'user' => $user, 'username' => $username]);
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
      //まずレビューのINSERT
        $this->validate($request, Review::$rules); //バリデーションの実行
        $review = new Review; //Reviewインスタンス作成
        $form = $request->all(); //送信されたフォームの値を保管
        unset($form['_token']); //CSRF非表示フィールド_token削除
        $review->fill($form)->save(); //fillメソッドでモデルのプロパティにまとめて代入

      //次にタグのINSERT
        //送信されたタグをスペース区切りで整える
        $spaces = array("　", "  ", "   ");
        $tags = trim(str_replace($spaces, " ", $request->tag_name));
        $tags = explode(" ", $tags);
        //新規タグだけtagsテーブルに挿入
        $array = [];
        foreach ($tags as $tag) {
            $record = Tag::firstOrCreate(['tag_name' => $tag]);
            array_push($array, $record);
        };
        //投稿に紐付けされるタグのidを配列化、中間テーブルへ
        $tags_id = [];
        foreach ($array as $tag) {
            array_push($tags_id, $tag['id']);
        };
        //中間テーブルにレコード挿入//tagsメソッドinReview.php
        $review->tags()->attach($tags_id);
      
      //トップページへ
        return redirect('/')->with('flash_message', '素敵な投稿ありがとうございます！'); 
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
