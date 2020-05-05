<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;

// Route::get('/admin', 'admin/Home/index');
//用户注册路由
Route::get('/register', 'admin/Register/showRegisterFrom');
Route::post('/user', 'admin/Register/userRegister');

//前台路由
Route::get('/', 'index/Index/show');

//用户登录路由
Route::get('/login', 'index/Index/showLoginFrom');
Route::post('/login', 'admin/Login/login');
Route::get('/logout', 'admin/Login/logout');

// 后台路由
Route::group(['namespace' => 'admim'], function () {
	Route::get('/admin', 'admin/Home/index');
	Route::Resource('admin/cate', 'admin/Cate');
	Route::Resource('admin/article', 'admin/Article');
});


