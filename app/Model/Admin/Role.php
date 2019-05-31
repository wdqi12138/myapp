<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [];
    /**
     *  用户和角色的关联
     *
     * @return \Illuminate\Http\Response
     */
    public function role_per()
    {
        return $this->belongsToMany('App\Model\Admin\Permission','role_per', 'roleid', 'perid');
    }
}
