<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = array('id');

    //public static $rules = array(
    //    'tag_name' => 'not_in: 　', //全角スペースを入らないようにしたい
    //);

    //
    public function reviews()
    {
        return $this->belongsToMany('App\Review')->withTimestamps();//相談会後にトライ
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    } 
}
