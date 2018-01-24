<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}