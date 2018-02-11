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

    //评论模型
    public function comments(){
        return $this->hasMany('App\Comment')->orderBy('created_at','desc');
    }

    //赞模型
    public function zans(){
        return $this->hasMany('App\Zan');
    }

    /*
     * 判断一个用户是否已经给这篇文章点赞了
     */
    public function zan($user_id)
    {
        return $this->hasOne(\App\Zan::class)->where('user_id', $user_id);
    }


}
