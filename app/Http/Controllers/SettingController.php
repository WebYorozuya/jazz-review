<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;//パスワード変更
use Illuminate\Support\Facades\Hash;//パスワード変更
use App\User;

class SettingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = Auth::id();
        $user_images = User::whereid($user_id)->get();
        return view('auth.settings',['user_images' => $user_images]);
        
    }

    //パスワード変更追加
    public function showChangePasswordForm(){
        return view('auth/passwords.changepassword');
    }

    public function changePassword(Request $request){
        //現在のパスワードが正しいか調べる
        if(!(Hash::check($request->get('current-password'),Auth::user()->password))){
            return redirect()->back()->with('change_password_error','現在のパスワードが間違っています。');
        }

        //現在のパスワードと新しいパスワードが違っているか調べる
        if(strcmp($request->get('current-password'),$request->get('new-password')) ==0 ){
            return redirect()->back()->with('change_password_error','新しいパスワードが現在のパスワードと同じです。違うパスワードを設定してください。');
        }

        //パスワードのバリデーション。new-password_confirmationフィールドの値が一致しているか。
        $validated_data = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        //パスワードを変更
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with('change_password_success','パスワードを変更しました。');
    }
    
}    