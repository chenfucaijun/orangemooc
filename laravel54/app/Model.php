<?php

namespace App;

use Illuminate\Database\Eloquent\Model as BaseModal;
use Illuminate\Database\Eloquent\SoftDeletes;

class Model extends BaseModal
{
    protected $guarded = [];
    protected $dates = ['deleted_at'];
}
