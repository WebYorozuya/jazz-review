<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Review;
use App\User;
use App\Like;
use Illuminate\Support\Facades\DB; //両立できるのね
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TagController extends Controller
{
    public function getTags()
    {
        if (Auth::user()) {
            $user = Auth::user()->account_name;
        } else {
            $user = 'ゲスト';
        }
        //TODO:0件のタグを除く
        $items = Tag::withCount('reviews')->orderBy('id', 'desc')->paginate(90);
        return view('tags.tags_list', [
            'user' => $user,
            'items' => $items
        ]);
    }

    public function getReviewsByTag(Request $request)
    {
        $tag_name = Tag::find($request->id)->tag_name;
        if (Auth::user()) {
            $user = Auth::user()->account_name;
        } else {
            $user = 'ゲスト';
        }
        //タグidを元にそのタグの入った投稿を全て取得
        $items = Tag::find($request->id)->reviews()->orderBy('id', 'desc')->paginate(10);
        //タグ名を取得
        $likes = new Like;
        $liked = like::all();
        $param = [
            'user' => $user,
            'items' => $items,
            'likes' => $likes,
            'liked' => $liked,
            'tag_name' => $tag_name,
        ];
        return view('reviews.reviews_by_tag', $param);

    }
}
