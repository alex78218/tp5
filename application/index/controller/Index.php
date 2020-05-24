<?php
namespace app\index\controller;
use think\Cookie;
use think\Session;

class Index
{
    //检测是否登录
    protected function _initialize()
    {
        if(Cookie('?sessionId') || Session('?id'))
        {
            return $this->redirect(url('index/Index/show'));
        }

    }
    public function show()
    {
    	return view('/index');
    }

    public function showLoginFrom()
    {
    	return view('/login');
    }

    public function showRegisterFrom()
    {
    	return view('/register');
    }

    public function logout()
    {
        session(null);
        cookie::clear('sessionId');
        Session::flash('success', '已经退出登录');
        return view('/login');
    }
}
