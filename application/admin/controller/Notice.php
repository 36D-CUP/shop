<?php
namespace app\admin\controller;

use app\admin\controller\Allow;
use think\Db;
use think\Session;

class Notice extends Allow
{


    //公告列表
    public function getNotice()
    {
        //勿动
            //分页
            $pro = input('pro')==""?1:input('pro');                         //获取分页传过来的当前页
            $showNum = input('data_num')?input('data_num'):'10';            //设定每一个显示的条数
            $str = $showNum == 'x'?'0,':(($pro-1)*$showNum).",".$showNum;   //分页,x为全部
            //搜索
            $s_val  = input('search_value');                                //获取搜索传过来的值
            $s_ty   = input('search_type');                                 //获取搜索传过来的字段名
            $s_type = $s_val?input('type'):'其他';                          //获取搜索传过来的搜索类型
        //勿动


        $table = $this->dbt.'notice';        //数据表

        switch($s_type){
            case 1:
                if($s_ty == 'id'){
                    $where['id'] = $s_val;
                }else{
                    $where[] = [$s_ty,'like', '%' . $s_val . '%'];
                }
                $num = Db::table($table)->where($where)->count();                   //数据总数量
                $data = Db::table($table)->where($where)->limit($str)->select();    //数据
            break;
            default:
                $num = Db::table($table)->count();                                  //数据总数量
                $data = Db::table($table)->limit($str)->select();                   //数据
            break;
        }


        //图片
        $img  = Db::table($this->dbimg)->where('img_surface_name',$table)->select();        //获取所有公告图片

        //整理数据
        for($i = 0 ; $i<count($data) ; $i++){
            //整理图片
            for($k = 0 ; $k<count($img) ; $k++){
                if($data[$i]['id'] == $img[$k]['img_surface_id']){
                    $data[$i]['img'] = $this->imgPath.$img[$k]['img_surface_name'].'/'.$img[$k]['img_path'];
                }
            }


        }

        //分页1.显示页数,2.数据数量,3当前页          封装在common
        $pageindex = pageindex($showNum , $num ,$pro);




        $arr['table']       = $table;                   //数据表名
        $arr['con']         = 'notice';            //控制器名
        $arr['fun']         = 'notice';                  //方法
        $arr['showNum']     = $showNum;                 //显示页数 
        $arr['pro']         = $pro;                     //当前页
        $arr['row']         = $data;                    //遍历数据
        $arr['title']       = '公告管理';                //主目录名称
        $arr['title_txt']   = '公告列表';                //子目录名称
        $arr['page']        = $pageindex['arr_page'];   //页数
        $arr['nums']        = $pageindex['arr_nums'];   //共多少条数据
        $arr['pros']        = $pageindex['arr_pros'];   //分页开始
        $arr['proe']        = $pageindex['arr_proe'];   //分页结束
        $arr['s_ty']        = $s_ty;                    //搜索键
        $arr['s_val']       = $s_val;                   //搜索值
        $arr['empty']      = "<tr><td colspan='100' style='text-align:center'>没有任何数据</td></tr>";      //显示条数

        return $this->fetch('Notice/notice',$arr);
    }

    //公告添加
    public function getNoticeadd()
    {

        $id = input('id');          //id

        $table = $this->dbt.'notice';                    //数据表
        //判断是否添加
        if(empty($id)){
            $title_txt  = '公告添加';
            $data['randimg'] = time().rand(100000,999999);
        }else{
            $title_txt  = '公告修改';
            $data        = Db::table($table)->where('id',$id)->find();        //找出公告

            $old_img['img_surface_name'] = $table;                                      //组合图片条件
            $old_img['img_surface_id']   = $id;
            $img = Db::table($this->dbimg)->where($old_img)->find();                    //查找图片

            if(!empty($img)){
                $img = $this->imgPath.$img['img_surface_name'].'/'.$img['img_path'];
            }
        }


        $arr['table']           = $table;               //数据表名  
        $arr['con']             = 'notice';       //控制器名
        $arr['fun']             = 'NoticeDoAdd';        //方法
        $arr['index']           = 'noticeadd';          //跳到什么方法
        $arr['title']           = '公告管理';            //主目录名称
        $arr['title_txt']       = $title_txt;           //子目录名称
        $arr['row']             = $data;                //数据
        $arr['img']             = $img;                 //图片
        $arr['level']           = $level;               //权限
        return $this->fetch('Notice/noticeadd',$arr);
    }

    //添加功能
    public function postNoticeDoAdd()
    {
        $id                = input('id');                   //id
        $data['title']     = input('title');                //标题
        $data['brief']     = input('brief');                //简介
        $data['randimg']   = input('randimg');              //随机值
        $data['content']   = input('content');              //内容
        //判断是改密码


        $files               = request()->file('imgs');        //图片
        $table = $this->dbt.'notice';
        //判断是否修改或添加
        if(!empty($id)){
            $bool = Db::table($table)->where('id',$id)->update($data);          //更新数据

            upload_file($files , $table , $id , 1);                             //操作图片

        }else{
            $bool = Db::table($table)->insertGetId($data);                      //插入数据

            upload_file($files , $table , $bool , 1);                           //操作图片
        }

        echo $id==""?'添加成功':'修改成功';
    }

    //课程添加与修改功能
    public function postTaskdoadd()
    {
        $id                  = input('id');                 //id
        $data['title']       = input('title');              //标题
        $data['e_title']     = input('e_title');            //标题,英
        $data['time']        = strtotime(input('time'));    //时间
        $data['sid']         = implode(',',input()['sid']); //标签
        $data['describe']    = input('describe');           //简介
        $data['e_describe']  = input('e_describe');         //简介英文
        $data['effect']      = input('effect');             //效果
        $data['e_effect']    = input('e_effect');           //效果英文
        $data['careful']     = input('careful');            //注意
        $data['e_careful']   = input('e_careful');          //注意英文

        $files               = request()->file('imgs');

        $table               = $this->dbt.'task';

        //判断是否修改或添加
        if(!empty($id)){
            $bool = Db::table($table)->where('id',$id)->update($data);          //更新数据

            upload_file($files , $table , $id , 1);                             //操作图片

        }else{
            $bool = Db::table($table)->insertGetId($data);                      //插入数据

            upload_file($files , $table , $bool , 1);                           //操作图片
        }

        echo $id==""?'添加成功':'修改成功';
    }

//下面通用功能 ------------------------------------------------------------------------------------
    //单击修改状态
    public function postClick_updata_status()
    {
        $id     = input('id');                  //获取ID
        $val    = input('val');                 //获取新值
        $key    = input('key');                 //获取字段名
        $table  = input('table');               //获取表名;

        $bool = Click_updata_status($id,$val,$key,$table);
        echo $bool;
    }

    //单击删除
    public function postClick_delete()
    {
        $id    = input('id');                   //id
        $table = input('table');                //表名

        $data = DB::table($table)->where('id',$id)->find()['randimg'];

        //判断是否是有富文本编辑
        if(!empty($data)){
            //获取当前文件所在的绝对目录
            $dir =  dirname($this->rootUrl.$table.'Htmlimg/'.$data.'/a');
            //扫描文件夹
            $file = scandir($dir);
        }

        for($i = 2 ;$i<count($file) ; $i++){
           $bools = @unlink('uploads/htmlimg/'.$table .'Htmlimg/'. $data.'/'.$file[$i]);   //删除原图片

        }
        if(is_dir('uploads/htmlimg/'.$table .'Htmlimg/'. $data.'/')){
            @rmdir('uploads/htmlimg/'.$table .'Htmlimg/'. $data.'/');   //删除文件夹
        }


        //删除图片
        delete_file($table , $id);
        //删除数据
        $bool = Db::table($table)->where('id',$id)->delete();

        echo $bool?"1":'no';
    }

    //双击修改名字
    public function postDouble_updata_txt()
    {
        $id    = input('id');                   //获取ID
        $val   = input('new_txt');              //获取新值
        $key   = input('name');                 //获取字段名
        $table = input('table');                //表

        $bool = Db::table($table)->where('id',$id)->update([$key  => $val]);
        echo $bool?'1':'2';
    }
}
