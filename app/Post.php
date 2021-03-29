<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function categories(){
        return $this->belongsToMany('App\Category','category_post')->withTimestamps();
    }
    public function tags(){
        return $this->belongsToMany('App\Tag','post_tag')->withTimestamps();
    }
}
