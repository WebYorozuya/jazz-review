<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //基本的なバリデーションの設定
    protected $guarded = array('id');//idはDBが振るからここガードしとく

    public static $rules = array(
        'user_id' => 'required',
        'live_date' => 'before_or_equal:today', //明日以降はダメ
        'title' => 'required',
        'text' => 'required'
    );

    public function user()
    {
        return $this->belongsTo('App\User'); //主テーブルusersへの関連付け
    }

    public function getData()
    {
        return $this->user->name;
    }
    //タグとのリレーション
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}

