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
        if (Auth::user()) {
            $user = Auth::user()->account_name;
        } else {
            $user = 'ゲスト';
        }
        //tagデータを取得
        $items = Tag::orderBy('id', 'desc')->paginate(90);
        return view('tags.tags_list', [
            'user' => $user,
            'items' => $items
        ]);
    }

    public function getTag(Request $request)
    {
        //ログインユーザー情報を取得
        if (Auth::user()) {
            $user = Auth::user()->account_name;
        } else {
            $user = 'ゲスト';
        }
        //タグidを元にそのタグの入った投稿を全て取得する
        $items = Tag::find($request->id)->reviews()->orderBy('id', 'desc')->paginate(10);
        //タグ名を取得したい
        $tag_name = Tag::find($request->id)->tag_name;
        return view('reviews.reviews_by_tag', [
            'user' => $user,
            'items' => $items,
            'tag_name' => $tag_name
        ]);

    }
}
