<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Review;
use App\Tag;
use App\User;

class ReviewController extends Controller
{
    //トップページを表示
    public function index(Request $request)
    {
        if (Auth::user()) {
            $user = Auth::user()->account_name;
        } else {
            $user = 'ゲスト';
        }
        $items = Review::orderBy('id', 'desc')->paginate(10);
        $param = ['items' => $items, 'user' => $user];
        return view('reviews.index', $param);
    }
    //ユーザー別投稿ページを表示
    public function getReviewsByUser(Request $request)
    {
        $items = Review::where('user_id', $request->user_id)->orderBy('id', 'desc')->paginate(10);
        if (Auth::user()) {
            $user = Auth::user()->account_name;
        } else {
            $user = 'ゲスト';
        }
        $account_name = User::find($request->user_id)->account_name;
        return view('reviews.reviews_by_user', ['items' => $items, 'user' => $user, 'account_name' => $account_name]);
    }
    //投稿ページを表示
    public function post(Request $request)
    {
        if (Auth::user()) {
            $user = Auth::user();
        } else {
            $user = 'ゲスト';
        }
        return view('reviews.post', ['user' => $user]);
    }
    //フォームの値を取得しDBにレコード挿入
    public function create(Request $request)
    {
      //まずレビューのINSERT
        $this->validate($request, Review::$rules);
        $review = new Review; //Reviewクラスのインスタンス作成
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
        //中間テーブルにレコード挿入
        $review->tags()->attach($tags_id);//attachメソッドで紐付け対象のidを紐付け対象のidを引数にしてリレーションを紐付ける
      
      //トップページへ
        return redirect('/')->with('flash_message', '素敵な投稿ありがとうございます！'); 
    }
    //投稿修正ページを表示
    public function edit(Request $request)
    {
        if (Auth::user()) {
            $user = Auth::user();
        } else {
            $user = 'ゲスト';
        }
        $review = Review::find($request->id);
        return view('reviews.edit', [
            'user' => $user,
            'review' => $review
            ]);
    }
    //投稿修正送信
    public function update(Request $request)
    {
        $this->validate($request, Review::$rules);
        $review = Review::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $review->fill($form)->save();

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
        //TODO:同一タグが複数あったら一つにする
        $tags_id = [];
        foreach ($array as $tag) {
            array_push($tags_id, $tag['id']);
        };
        //中間テーブルにレコード挿入
        $review->tags()->attach($tags_id);
      
      //トップページへ
        return redirect('/')->with('flash_message', '投稿を修正しました！');
    }
    //投稿削除
    public function delete(Request $request)
    {
        $review_tags = DB::table('review_tag')->where('review_id', $request->id)->get();
        // $tags_num = $review_tag->count();
        if (!empty($review_tags)) {
            foreach ($review_tags as $review_tag)
            {
                $count_tag = DB::table('review_tag')->where('tag_id', $review_tag->tag_id)->count();
                $delete_review_tag = DB::table('review_tag')
                    ->where('review_id', $request->id)
                    ->where('tag_id', $review_tag->tag_id)
                    ->delete();
                if ($count_tag <= 1) {
                    // $tags [] = Tag::find($review_tag->tag_id);
                    // Log::info($delete_review_tag); exit();
                    $tags = Tag::find($review_tag->tag_id)->delete();
                }
            }
        }

        $review = Review::find($request->id)->delete();

        return redirect('/');
    }
}
