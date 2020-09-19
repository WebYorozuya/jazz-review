<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'tag' => 'tag_name',
    );

    //
    public function reviews()
    {
        return $this->belongsToMany('App\Review');
    }
}
