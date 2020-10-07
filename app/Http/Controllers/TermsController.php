<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //ログインユーザ情報取得用に追加
use App\User; //タグ用に追加

class TermsController extends Controller
{
    //
    public function index()
    {
        if (Auth::user()) { //ログインユーザ情報取得
            $user = Auth::user()->account_name;
        } else {
            $user = 'ゲスト';
        }
        return view('terms.terms', ['user' => $user]);
    }
}
