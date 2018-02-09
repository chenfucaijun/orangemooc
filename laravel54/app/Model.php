<?php

namespace App;

use Illuminate\Database\Eloquent\Model as BaseModal;
use Illuminate\Database\Eloquent\SoftDeletes;

class Model extends BaseModal
{
    protected $guarded = [];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    //不可以填充的数据
}
