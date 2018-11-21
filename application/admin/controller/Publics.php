<?php
namespace app\admin\controller;

use app\admin\controller\Allow;
use think\Db;
use think\Session;

class Publics extends Allow
{
    //首页
    public function postHtmlimg()
    {

        $table = input('table');//数据库
        $id = input('id');//数据库
        $files               = request()->file();        //图片

        $img_path = upload_file($files , $table.'Htmlimg' , $id , 2);                             //操作图片

        $img = array();

        for($i = 0 ; $i<count($img_path) ; $i++){
            $img[] = $this->imgPath.$img_path[$i];
        }
        $arr = array(
            'errno'=>0,
            'data'=>$img
        );
        return json($arr);

    }

}
