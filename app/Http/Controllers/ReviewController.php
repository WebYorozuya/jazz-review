<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review; //追加
use Illuminate\Support\Facades\Auth; //ログインユーザ情報取得用に追加
use Illuminate\Support\Facades\Log;//頻繁に使った方がいい
use App\Tag; //タグ用に追加
use App\User; //タグ用に追加

class ReviewController extends Controller
{
    //トップページを表示
    public function index(Request $request)
    {
        // Log::info('hello');
        // return; 
        if (Auth::user()) { //ログインユーザ情報取得
            $user = Auth::user()->account_name;
        } else {
            $user = 'ゲスト';
        }
        $items = Review::orderBy('id', 'desc')
        ->paginate(10); //reviewsテーブルから取得
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
            $user = Auth::user()->account_name;
        } else {
            $user = 'ゲスト';
        }
        $account_name = User::find($request->user_id)->account_name;
        return view('userposts', ['items' => $items, 'user' => $user, 'account_name' => $account_name]);
    }
    //タグ別投稿ページを表示
    public function tagposts(Request $request)
    {
        $tag = Tag::find($request->id);
        $items = $tag->reviews; //Tag.phpのreviews()
        // foreach ($items as $item) {
            // Log::info('hogehoge');
            // Log::info($item);
            // var_dump($item);
        // }
        // exit();
        // var_dump($items);
        if (Auth::user()) { //ログインユーザ情報取得
            $user = Auth::user()->account_name;
        } else {
            $user = 'ゲスト';
        }
        return view('tagposts', ['items' => $items, 'user' => $user]);
    }
    //投稿ページを表示
    public function post(Request $request)
    {
        if (Auth::user()) { //ログインユーザ情報取得
            $user = Auth::user();
        } else {
            $user = 'ゲスト';
        }
        // var_dump($user); exit();
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
        $review->tags()->attach($tags_id);//attachメソッドで紐付け対象のidを紐付け対象のidを引数にしてリレーションを紐付ける
      
      //トップページへ
        return redirect('/')->with('flash_message', '素敵な投稿ありがとうございます！'); 
    }
    //投稿修正ページを表示
    public function modify(Request $request)
    {
        if (Auth::user()) {
            $user = Auth::user();
        } else {
            $user = 'ゲスト';
        }
        $review = Review::find($request->id);
        $tags = Review::find($request->id)->tags();
        // var_dump($tags);exit();
        return view('review.modify', [
            'user' => $user,
            'review' => $review
            ]);
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
