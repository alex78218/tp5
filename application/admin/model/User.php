<?php

namespace app\admin\model;

use think\Model;

class User extends Model
{
	// 定义时间戳字段名
    protected $createTime = 'created_at';
    protected $updateTime = 'updated_at';

    public function setPasswordAttr($value)
    {
        return MD5($value);
    }
}
