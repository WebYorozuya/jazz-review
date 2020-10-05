<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;//追記
use App\Mail\ContactMail; //追記
use Illuminate\Support\Facades\Auth; //ログインユーザ情報取得用に追加

class ContactController extends Controller
{
    //contact表示
    public function index()
    {
        if (Auth::user()) { //ログインユーザ情報取得
            $user = Auth::user()->name;
        } else {
            $user = 'ゲスト';
        }
        return view('contact.contact', ['user' => $user]);
    }
    //DB挿入とメール送信
    public function process(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email',
            'text'     => 'required',
        ]);
        $input = $request->all();
        unset($input['_token']); //CSRF非表示フィールド_token削除
        // Mail::to($input['email'])->send(new ContactMail('mailxs.contact', 'お問い合わせありがとうございます', $input));
        Mail::to('jazzreview.team@gmail.com')->send(new ContactMail('contact.mail', 'お問い合わせを受信しました', $input));
        return redirect('/');
    }
}
