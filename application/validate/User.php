<?php
namespace app\validate;

use think\Validate;

class User extends Validate
{
	protected $rule =[
		'username|用户名' => 'require|max:16|min:4|chsAlpha|token',
		'password|密码' => 'require|number|length:4,16',
		'conpass|二次密码' => 'require|confirm:password',
	];

	protected $scene = [
		'login' => ['username', 'password'],
	];
}