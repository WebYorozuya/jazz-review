<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //基本的なバリデーションの設定
    protected $guarded = array('id');//idはDBが振るからここガードしとく

    public static $rules = array(
        'user_id' => 'required',
        'live_date' => 'before_or_equal:tomorrow',
        'title' => 'required',
        'text' => 'required'
    );

    public function user()
    {
        return $this->belongsTo('App\User'); //主テーブルusersへの関連付け
    }
    //投稿の中で投稿者を表示するのに使用
    public function getData()
    {
        return $this->user->account_name; //上のuserメソッドからnameを引っ張る?
    }
    //タグとのリレーション
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    } 
} 
