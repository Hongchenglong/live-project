<?php

namespace app\index\controller;

header("content-type:text/html;charset=utf-8");

use \think\Db;

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

	public function register()
	{
	
		

		$studentId = $_POST['studentId'];
		$name = $_POST['name'];
		$entryTime = $_POST['entryTime'];
		// $entryTime = date('Y-m-d', time());
		$departureTime = $_POST['departureTime'];
		

		$data = array();
		$data['studentId'] = $studentId;
		$data['name'] = $name;
		$data['entryTime'] = $entryTime;
		$data['departureTime'] = $departureTime;


		Db::table('student')->insert($data);

		$this->redirect("http://localhost:8080/live-project/public/index.php");
		// return $this->fetch();
	}
}
