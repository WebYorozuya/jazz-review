<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag; //タグ用に追加
use App\Review; //タグ用に追加
use App\User;
use Illuminate\Support\Facades\DB; //両立できるのね
use Illuminate\Support\Facades\Auth; //ログインユーザ情報取得用に追加
use Illuminate\Support\Facades\Log;//頻繁に使った方がいい

class TagController extends Controller
{
    //
    public function index()
    {
        if (Auth::user()) { //ログインユーザ情報取得
            $user = Auth::user();
        } else {
            $user = 'ゲスト';
        }
        //tagデータを取得
        $items = Tag::orderBy('id', 'desc')
        ->paginate(90);
        // foreach ($items as $item) {
        //     ddd($item->reviews()->where('tag_id', $item->id));
        // }
        //review_tagから各tag_idの数を数える
        $tag_counts = DB::table('review_tag')->select('id','tag_id')->groupBy('tag_id')->count(['id']);
        // $tag_counts = DB::select('select count(id), tag_id from review_tag group by tag_id');
        // $tag_counts [] = DB::table('review_tag')
        //     ->select(DB::raw('count(id), tag_id'))
        //     ->groupBy('tag_id')
        //     ->get();
        // print_r($items); exit();
        return view('tags', [
            'user' => $user,
            'items' => $items,
            'tag_counts' => $tag_counts
        ]);
        // return view('tags', ['items' => $items]);
    }

    public function getTag(Request $request)
    {
        //ログインユーザー情報を取得
        if (Auth::user()) {
            $user = Auth::user();
        } else {
            $user = 'ゲスト';
        }
        
        //タグidを元にそのタグの入った投稿を全て取得する
        // $tag = Tag::findOrFail($request->id);
        // foreach ($tag->reviews as $review) {
        //     $items = $review;
        // }
        // $items = Review::with('tags')->where('id', $tag)->paginate(10);
        // $items = $reviews->$tag_id;
        $items = Tag::find($request->id)->reviews()->orderBy('id', 'desc')->paginate(10);
        // ddd($items);

        //タグ名を取得したい
        $tag_name = Tag::find($request->id)->tag_name;
        // foreach ($items->tags as $tag) {
        //     $tag_name = $tag->tag_name;
        // }
        // $tag_name = $items->tag_name;
        return view('tagposts', [
            'user' => $user,
            'items' => $items,
            'tag_name' => $tag_name
        ]);

    }
}
