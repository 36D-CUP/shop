<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Session;

Class Allow extends Controller
{
	public $dbt = 'ms_';								//表前缀
	public $dbimg = 'ms_img';							//文件表
	public $imgPath = '/shop/public/uploads/';		//普通上传的图片路径
	public $url     = '/shop/public/';		//普通上传的图片路径
	public $rootUrl = '/wamp64/www/shop/public/uploads/htmlimg/';	//根目录

	protected function initialize()
	{
	    Session_start();       //使用SESSION前必须调用该函数。

		if(!isset($_SESSION['admin_id'])){
			return $this->redirect($this->url.'login/login');
	    }

    	$role = Db::table($this->dbt.'admin_dis')->alias('R')->join($this->dbt.'admin_node N','R.nid=N.id')->where('R.rid',$_SESSION['admin_level'])->select();

		foreach($role as $v){
			$arrCont[] = $v['cont'];
			$arrFun[]  = $v['fun'];
		}

		// foreach($role as $v){
		// 	if(!in_array(request()->controller(),$arrFun) and !in_array(request()->action(),$arrFun)){
		// 		$this->error('没有权限',$this->url.'admin/index');
		// 		$this->error('没有权限',$this->url.'admin/index');
		// 	}
		// }
		$val = "0";
		// dump(request()->controller());
		// dump(request()->action());
		// exit;
		for($i = 0 ; $i<count($role) ; $i++){
			if(request()->controller() == $role[$i]['cont'] && request()->action() == $role[$i]['fun']){
				$val = 1;
			}
		}

		if($val != 1){
				$this->error('没有权限',$this->url.'admin/index');

		}
	}

}
