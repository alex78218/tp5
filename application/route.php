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

//用户注册路由
Route::get('/register', 'index/Index/showRegisterFrom');
Route::post('/user', 'admin/Register/userRegister');

//前台路由
Route::get('/', 'index/Index/show');

//用户登录路由
Route::get('/login', 'index/Login/showLoginFrom');
Route::post('/login', 'index/Login/login');
Route::get('/logout', 'index/Index/logout');

// 后台路由
Route::group(['namespace' => 'admim'], function () {
	Route::get('/admin', 'admin/Home/index');
	Route::Resource('admin/cate', 'admin/Cate');
	Route::Resource('admin/article', 'admin/Article');
});

Route::get('/admin/cate/edit/:id' , 'admin/Cate/edit');
Route::post('admin/cate/update/:id', 'admin/Cate/update');

