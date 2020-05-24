<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Session;
use app\common\model\category;

class Cate extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $datas = category::where('deleted_at')->paginate(1);

        return view('cate/index')->assign('datas', $datas);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        
        return view('cate/add');
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $cate = new category;
        $cate->catename  = $request->post('catename');

        $cate->save();
        Session::flash('success', '创建成功');
        return redirect('/admin/cate');
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
        $datas = category::get($id);
        return view('cate/edit')->assign('datas', $datas);
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
        $data = category::get($id);
        $data->catename = $request->post('catename');
        $data->save();
        return $this->success('成功更新', '/admin/cate');

    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        $data = category::find($id);
        $result = $data->delete();

        if($result) {
            Session::flash('success', '成功删除');
            return redirect('/admin/cate');
        } else {
            Session::flash('danger', '删除失败');
        }
        
    }
}
