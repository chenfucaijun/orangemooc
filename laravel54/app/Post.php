<?php

namespace App;

use App\Model;

class Post extends Model
{
    //
    protected $table = "posts";

    //关联用户
    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }


}
