<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','account_name', 'email', 'password','user_image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
//}

//class User extends Model //かく追加 //<--エラー出たので上のclassの中に入れてみた。実験中。あとで整理。でも表示できたぽい
//{
    //
    public function review() //reviewメソッド
    {//reviewsテーブルとのリレーション。おそらく投稿者一覧ページで使える
        return $this->hasMany('App\Review'); //hasManyメソッド
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

}
