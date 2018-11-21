<?php
//规定控制器是属于哪个模块下的控制器
namespace app\admin\controller;
//导入Controller
use think\Controller;
// 导入Session类
use think\Session;
// 导入Db
use think\Db;
class Login extends Controller
{
    public function getLogin()
    {
        Session_start();                //使用SESSION前必须调用该函数。
        if(!empty($_SESSION['admin_id'])){
            return $this->redirect('/shop/public/admin/index');
        }
    	return $this->fetch("Login/login");
    }
    // 执行登陆
    public function postCheck(){
        
        Session_start();                //使用SESSION前必须调用该函数。
        $fcode = input("fcode");        // 获取输入的验证码

        $table = "ms_admin";

        // 判断验证码是否正确
        if (!captcha_check($fcode)) {
            return '3';
        }else{
            $data['admin_user'] = input('admin_user'); 
            $data['admin_pass'] = md5(input('admin_pass'));
            $info = Db::table($table)->where($data)->find();
            if ($info) {
            	$data['status'] = 1;
            	$info = Db::table($table)->where($data)->find();
            	if (!$info) {
            		echo 4;
            	}
                $img_data['img_surface_name'] = $table;
                $img_data['img_surface_id'] = $info['id'];
                $img  = Db::table('ms_img')->where($img_data)->find();

                $_SESSION['admin_user'] = $info['admin_name'];            //管理员名称
                $_SESSION['admin_id']   = $info['id'];                    //管理员id
                $_SESSION['admin_level']   = $info['level'];                    //管理员权限
                $_SESSION['admin_img']  = '/shop/public/uploads/'.$img['img_surface_name'].'/'.$img['img_path'];         //管理员头像
                echo "1";
    		}else{
                echo "2";
    		}
    	}
    }


    // 执行退出
    public function getLogout(){
        Session_start(); 
        unset($_SESSION['admin_user']);
        unset($_SESSION['admin_id']);
        unset($_SESSION['admin_img']);
        unset($_SESSION['admin_level']);
    	$this->redirect("/shop/public/login/login");
    }
}
