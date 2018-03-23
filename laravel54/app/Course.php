<?php

namespace App;

use App\Model;
use Laravel\Scout\Searchable;

class Course extends Model
{
    //搜索类
    use Searchable;

    //
    protected $table = "courses";


    /*
     * -----------------------------------赞模型-----------------------------------
     */

    //课程中有多少个赞
    public function zans()
    {
        return $this->hasMany('App\Zan');
    }

    //判断一个用户是否已经给这个课程点赞了
    public function zan($user_id)
    {
        return $this->hasOne(\App\Zan::class)->where('user_id', $user_id);
    }

    /*
     * -----------------------------------赞模型-----------------------------------
     */





    /*
     * -----------------------------------用户模型-----------------------------------
     */
    //学习了这个课程的所有用户
    public function users()
    {
        return $this->belongsToMany(\App\User::class, 'users_courses', 'course_id', 'user_id');
    }


    // 学习了这个课程的用户数
    public function courseUsers()
    {
        return $this->hasMany(\App\UserCourse::class, 'user_id');
    }

    /*
     * -----------------------------------用户模型-----------------------------------
     */


}
