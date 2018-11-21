<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// use think\Route;
Route::Controller('/publics','admin/Publics');			//公共

Route::Controller('/admin','admin/Index');			//后台首页

Route::Controller('/notice','admin/Notice');		//后台公告

Route::Controller('/role','admin/Role');			//后台角色

Route::Controller('/node','admin/Node');			//后台权限列表

Route::Controller('/login','admin/Login');			//后台登录

Route::Controller('/user','admin/User');			//后台用户



