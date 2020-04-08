<?php

namespace app\index\controller;

header("content-type:text/html;charset=utf-8");


class Index extends BaseController
{
	public function index()
	{
		// 不带任何参数 自动定位当前操作的模板文件
		return $this->fetch();
	}

	public function diplay()
	{
		// 不带任何参数 自动定位当前操作的模板文件
		return $this->fetch();
	}

}
