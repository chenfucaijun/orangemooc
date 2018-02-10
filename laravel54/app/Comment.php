<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";

    //评论所属文章
    public function post(){
        return $this->belongsTo('App\Post','post_id','id');
    }
}
