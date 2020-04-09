<?php

namespace app\index\controller;

header("content-type:text/html;charset=utf-8");

use \think\Db;
use \think\Controller;
use \think\Request;
use \think\Session;
use \think\Validate;

class Index extends BaseController
{
	/**
	 * 123.56.93.164
	 * localhost:8080
	 */
	public function index()
	{
		// 不带任何参数 自动定位当前操作的模板文件
		return $this->fetch();
	}

	public function register()
	{

		$studentId = $_POST['studentId'];
		$name = $_POST['name'];
		$entryTime = date('Y-m-d H:i:s', time());

		if (strlen($studentId) != 9 || strlen($name) < 4) {
			$this->redirect("http://123.56.93.164/live-project/public/index.php");
		} 

		$data = array();
		$data['studentId'] = $studentId;
		$data['name'] = $name;
		$data['entryTime'] = $entryTime;



		Db::table('student')->insert($data);

		$this->redirect("http://123.56.93.164/live-project/public/index.php");
	}

	public function search()
	{
		
		return $this->fetch();
	}


	public function leave()
	{


		$id = intval(Request::instance()->get('id'));

		// $departureTime = date('Y-m-d', time());
		DB::table('student')->where('id', $id)->update(['departureTime' => date('Y-m-d H:i:s')]);
		// $studentId = DB::table('student')->where('id', $id)->field('studentId')->find();

	
		$this->redirect("http://123.56.93.164/live-project/public/index.php?s=index/index/search");
	}


	public function delete()
	{

		$id = intval(Request::instance()->get('id'));
		DB::table('student')->where('id', $id)->delete();
		$this->redirect("http://123.56.93.164/live-project/public/index.php");
	}
}
