<?php

namespace App;

use App\Model;

class Fan extends Model
{
    //该用户的粉丝用户
    public function fuser(){
        return $this->hasOne(\App\User::class,'id','fan_id');
    }

    //该用户关注的用户
    public function user(){
        return $this->hasOne(\App\User::class,'id','star_id');
    }





}
