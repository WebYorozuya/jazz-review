<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag; //タグ用に追加

class TagController extends Controller
{
    //
    public function index()
    {
        $items = Tag::orderBy('id', 'desc')
        ->paginate(90); //reviewsテーブルから取得
        return view('tags', ['items' => $items]);
    }
}
