<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag; //タグ用に追加
use Illuminate\Support\Facades\DB; //両立できるのね
use Illuminate\Support\Facades\Auth; //ログインユーザ情報取得用に追加

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
        //review_tagから各tag_idの数を数える
        $tag_counts = DB::table('review_tag')->select('id','tag_id')->groupBy('tag_id')->count(['id']);
        // $tag_counts = DB::select('select count(id), tag_id from review_tag group by tag_id');
        // $tag_counts [] = DB::table('review_tag')
        //     ->select(DB::raw('count(id), tag_id'))
        //     ->groupBy('tag_id')
        //     ->get();
        // print_r($items); exit();
        return view('tags', ['user' => $user, 'items' => $items, 'tag_counts' => $tag_counts]);
        // return view('tags', ['items' => $items]);
    }
}
