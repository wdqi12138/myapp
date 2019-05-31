<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class User_role extends Model
{
    //
     /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'user_role';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [];
}
