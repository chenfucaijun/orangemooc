<?php

namespace App;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Model extends EloquentModel
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    //不可以填充的数据
    protected $guarded = [];
}
