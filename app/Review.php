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

    //データの内容をテキストで返す
    public function getData()
    {
        return $this->id . ': ' . $this->title;
    }
}
