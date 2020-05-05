<?php
namespace app\index\controller;

class Index
{
    public function show()
    {
    	return view('/index');
    }

    public function showLoginFrom()
    {
    	return view('/login');
    }
}
