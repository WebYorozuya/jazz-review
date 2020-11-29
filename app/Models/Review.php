<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Like;

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
        return $this->belongsTo('App\User')->withTrashed(); 
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    // public function isCreatedBy($user, $review_id): bool {
    //     return $user->id !== Review::where('id', $review_id)->first()->user_id;
    // }

    public function isLikedBy($user): bool {
        return Like::where('user_id', $user->id)->where('review_id', $this->id)->first() !==null;
    }
} 
