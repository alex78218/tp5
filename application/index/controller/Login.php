<?php

namespace app\index\controller;

use think\Controller;
use think\Request;
use app\admin\model\User;
use think\Session;
use think\Cookie;

class Login extends Controller
{
    //检测是否登录
    protected function _initialize()
    {
        if(Cookie('?sessionId') || Session('?id'))
        {
            return $this->redirect(url('index/Index/show'));
        }

    }
    //显示登陆表单
    public function showLoginFrom()
    {
        return view('/login');
    }

    public function login(Request $request, User $user)
    {
        $data =[
            'username' => $request->post('username'),
            'password' => $request->post('password'),
            '__token__' => $request->post('__token__'),
        ];

        //验证数据
        $validate = validate('app\validate\User');
        $validateChecked = $validate->scene('login')->check($data);

        // var_dump($validate->getError());die();

        unset($data['__token__']);
        $data['password'] = md5($data['password']);
        $result = $user->get($data);
        
        if(!$result || !$validateChecked)
        {
            // var_dump($validate->getError());die();
            Session::flash('danger', $validate->getError());
            return $this->redirect(url('index/Index/showLoginFrom'));

        } else {
            $sessionId = Session_id();
            session('userId', $result->id);
            session('userInfo', $result->getData());
            Cookie::set('sessionId', $sessionId);

            Session::flash('success', '成功登录!');
            return $this->redirect('/');
        }
    }

    

}
