<?php

namespace app\index\controller;

use think\exception\ValidateException;
use think\Controller;
use think\Request;
use think\Session;
use app\admin\model\User;

class Register extends Controller
{
    
    //显示注册表单
    public function showRegisterFrom()
    {
        return view('register');
    }

    //注册主逻辑
    public function userRegister(Request $request, User $user)
    {
        //接收数据+token
       $data = [
            'username' => $request->post('username'),
            'password' => $request->post('password'),
            'conpass' => $request->post('conpass'),
            '__token__' => $request->post('__token__'),
       ];

       //验证数据
       $validate = validate('app\validate\User');
       $result =$validate->check($data);
        
        //手动抛出验证异常
        if(!$result)
        {
            
            Session::flash('danger', $validate->getError());
            return $this->redirect('/index.php/register');

        } else {
            $user->data($data, true);
            $user->allowField(true)->save();
            Session::flash('success', '注册成功!');
            return $this->redirect('/');
        }
       
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
