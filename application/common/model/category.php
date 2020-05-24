<?php

namespace app\common\model;

use think\Model;
use traits\model\SoftDelete;

class category extends Model
{
	use SoftDelete;
    // 定义时间戳字段名
    protected $createTime = 'created_at';
    protected $updateTime = 'updated_at';
    protected $deleteTime = 'deleted_at';
    
}
