<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag; //タグ用に追加
use Illuminate\Support\Facades\DB; //両立できるの？

class TagController extends Controller
{
    //
    public function index()
    {
        //tagデータを取得
        $items = Tag::orderBy('id', 'desc')
        ->paginate(90);
        //review_tagから各tag_idの数を数える
        $tag_counts = DB::table('review_tag')->select('id','tag_id')->groupBy('tag_id')->count(['id']);
        // $tag_counts = DB::select('select count(id), tag_id from review_tag group by tag_id');
        // print_r($tag_counts); exit();
        return view('tags', ['items' => $items, 'tag_counts' => $tag_counts]);
        // return view('tags', ['items' => $items]);
    }
}
