<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    public function reviews()
    {
        return $this->belongsToMany('App\Review');
    }
}
