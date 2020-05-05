<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use app\admin\model\User;
use think\Session;
use think\Cookie;

class Login extends Controller
{
    protected function _initialize()
    {
        parent::_initialize();
        if(!cookie('sessionId'))
        {
            return $this->redirect('/index.php/login');
        }
    }
    //显示登陆表单
    public function showLgoinFrom()
    {
        return view('../index/view/login');
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

        unset($data['__token__']);
        $result = $user->get($data);
        
        if(!$result || !$validateChecked)
        {
            var_dump($validate->getError());
            die();

            Session::flash('danger', $validate->getError());
            return $this->redirect('/index.php/login');
        } else {
            $sessionId = Session_id();
            session('userId', $result->id);
            session('userInfo', $result->getData());
            Cookie::set('sessionId', $sessionId);

            Session::flash('success', '成功登录!');
            return $this->redirect('/');
        }
    }

    public function logout()
    {
        session(null);
        cookie::clear('sessionId');
        Session::flash('success', '已经退出登录');
        return $this->redirect('/index.php/login');
    }
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
