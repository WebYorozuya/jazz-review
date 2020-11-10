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
        'title' => 'required|max:80',
        'text' => 'required|max:1000', //TODO:NGワードをフィルターかけたい
    );

    public function user()
    {
        return $this->belongsTo('App\User'); 
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    } 
} 
