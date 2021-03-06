<?php

namespace App;

use App\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminUser extends Authenticatable
{
    //

    protected $table = "admin_users";
    protected $guarded = [];


    /*
     * 用户有哪些角色
     */
    public function roles()
    {
        return $this->belongsToMany(\App\AdminRole::class, 'admin_role_user', 'user_id', 'role_id')->withPivot(['user_id', 'role_id']);
    }

    /*
     * 是否有某个角色
     */
    public function isInRoles($roles)
    {
        //是否有交集
        //两个感叹号返回布尔值
        return !!$roles->intersect($this->roles)->count();
    }

    /*
    * 给用户分配角色
    */
    public function assignRole($roleName)
    {
        $role = \App\AdminRole::where('name', $roleName)->first();
        return $this->roles()->save($role);
    }

    /*
     * 删除user和role的关联
     */
    public function deleteRole($role)
    {
        return $this->roles()->detach($role);
    }


    /*
     * 是否有权限
     */
    public function hasPermission($permission)
    {
        return $this->isInRoles($permission->roles);
    }


}
