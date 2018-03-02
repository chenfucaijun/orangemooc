<?php

namespace App;

use App\Model;
use function GuzzleHttp\Psr7\_parse_request_uri;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Builder;

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


    /*
    * 一篇文章有哪些主题
    */
    public function topics()
    {
        return $this->belongsToMany(\App\Topic::class, 'post_topics', 'post_id', 'topic_id')->withPivot(['topic_id', 'post_id']);
    }

    public function postTopics()
    {
        return $this->hasMany(\App\PostTopic::class, 'post_id');
    }


    //不属于某个专题的文章
    public function scopeTopicNotBy(Builder $query, $topic_id)
    {
        return $query->doesntHave('postTopics', 'and', function ($q) use ($topic_id) {
            $q->where("topic_id", $topic_id);
        });
    }


    /*
     * 可以显示的文章
     */
    public function scopeAviable($query)
    {
        return $query->whereIn('status', [0, 1]);
    }

    //属于某一个作者的文章
    public function scopeAuthorBy(Builder $query, $user_id)
    {
        return $query->where('user_id', $user_id);
    }


    //匿名全局scope,获取文章的时候默认取该scope中的文章
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope("available", function (Builder $builder) {
            $builder->whereIn('status', [0, 1]);
        });
    }


}
