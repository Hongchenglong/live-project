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
		$student = Db::table('student')
			->order('studentId')
			->where('deleted', 0)
			->paginate(10);
		$this->assign("student", $student);
		// 不带任何参数 自动定位当前操作的模板文件
		return $this->fetch();
	}

	public function register()
	{

		$studentId = $_POST['studentId'];
		$name = $_POST['name'];
		$entryTime = date('Y-m-d H:i:s', time());

		if (strlen($studentId) != 9 || strlen($name) < 4 || strlen($name) > 16) {
			$this->redirect("http://localhost:8080/live-project/public/index.php");
		}

		$data = array();
		$data['studentId'] = $studentId;
		$data['name'] = $name;
		$data['entryTime'] = $entryTime;



		Db::table('student')->insert($data);

		$this->redirect("http://localhost:8080/live-project/public/index.php");
	}

	public function search()
	{

		if (!empty($_POST['studentId'])) {
			$studentId = $_POST['studentId'];
			cookie('studentId', $_POST['studentId'], 3600);
		} else
			$studentId = cookie('studentId');


		$where = array();
		$where['studentId'] = $studentId;
		$student = Db::table('student')
			->where($where)
			->order('entryTime desc')
			->select();
		$this->assign("student", $student);
		
		return $this->fetch();
	}


	public function leave()
	{
		$id = intval(Request::instance()->get('id'));

		DB::table('student')->where('id', $id)->update(['departureTime' => date('Y-m-d H:i:s')]);

		$this->redirect("http://localhost:8080/live-project/public/index.php?s=index/index/search");
	}


	public function delete()
	{

		$id = intval(Request::instance()->get('id'));
		DB::table('student')->where('id', $id)->update(['deleted'=>1]);
		$this->redirect("http://localhost:8080/live-project/public/index.php");
	}
}
