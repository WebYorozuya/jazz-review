<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = array('id');

    public function reviews()
    {
        return $this->belongsToMany('App\Review')->withTimestamps();//相談会後にトライ
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    } 

    public function scopeReviewsNotZero($query) {
        // TODO:スコープで実現したいがreviews_countがないと言われる...
        // $reviews_count = Tag::withCount('reviews')->get()->reviews_count;
        // Log::info($reviews_count);
        // return $query->where(Tag::withCount('reviews')->get()->reviews_count, '>', 0);
    }
}
