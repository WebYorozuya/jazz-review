<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//DB接続
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $items = DB::select('select * from reviews');
        return view('index', ['items' => $items]);
    }

    public function post(Request $request) {
        $data = [
            'user'=>'ゲスト',
        ];
        return view('post', $data);
    }

    //formの値を取得しよう
    public function create(Request $request) {
        $param = [
            'live_date' => $request->live_date,
            'title' => $request->title,
            'text' => $request->text,
        ];
        DB::insert('insert into reviews (live_date, title, text, created_at, updated_at, user_id) values (:live_date, :title, :text, NOW(), NOW(), 1)', $param);
        return redirect('/');
    }
}
