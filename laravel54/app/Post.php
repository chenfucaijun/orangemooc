<?php

namespace App;

use App\Model;
use function GuzzleHttp\Psr7\_parse_request_uri;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use Searchable;

    //
    protected $table = "posts";

    //关联用户
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    //评论模型
    public function comments()
    {
        return $this->hasMany('App\Comment')->orderBy('created_at', 'desc');
    }

    //赞模型
    public function zans()
    {
        return $this->hasMany('App\Zan');
    }

    /*
     * 判断一个用户是否已经给这篇文章点赞了
     */
    public function zan($user_id)
    {
        return $this->hasOne(\App\Zan::class)->where('user_id', $user_id);
    }

    /*
     * 定义索引里的type
     */
    public function searchableAs()
    {
        return "post";
    }

    /*
     * 定义
     */
    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'content' => $this->content
        ];

    }

}
