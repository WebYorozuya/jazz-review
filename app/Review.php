<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //基本的なバリデーションの設定
    protected $guarded = array('id');

    public static $rules = array(
        'user_id' => 'required',
        'title' => 'required',
        'message' => 'required'
    );

    public function user()
    {
        return $this->belongTo('App\User'); //主テーブルusersへの関連付け
    }
}

