<?php
namespace app\admin\controller;

use app\admin\controller\Allow;
use think\Db;
use think\Session;

class Node extends Allow
{

    //权限列表
    public function getNode()
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


        $level = input('level');            //选择的权限
        $dis_where['rid'] = 1;
        if(!empty($level)){
            $dis_where['rid'] = $level;
        }

        $table = $this->dbt.'admin_node';
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


        $pageindex = pageindex($showNum , $num ,$pro);

        $node = Db::table($this->dbt.'admin_dis')->where($dis_where)->select();
        //角色
        $role = Db::table($this->dbt.'admin_role')->select();


        $arr['node'][] = "";

        for($i = 0 ; $i<count($node) ; $i++)
        {
            $arr['node'][] = $node[$i]['nid'];

        }
        $arr['level']       = $role;                    //权限名
        $arr['new_level']       = $dis_where['rid'];                    //当前选中的等级
        $arr['table']       = $table;                   //数据表名
        $arr['con']         = 'node';            //控制器名
        $arr['fun']         = 'node';                  //方法
        $arr['showNum']     = $showNum;                 //显示页数 
        $arr['pro']         = $pro;                     //当前页
        $arr['row']         = $data;                    //遍历数据
        $arr['title']       = '权限管理';              //主目录名称
        $arr['title_txt']   = '权限列表';              //子目录名称
        $arr['page']        = $pageindex['arr_page'];   //页数
        $arr['nums']        = $pageindex['arr_nums'];   //共多少条数据
        $arr['pros']        = $pageindex['arr_pros'];   //分页开始
        $arr['proe']        = $pageindex['arr_proe'];   //分页结束
        $arr['s_ty']        = $s_ty;                    //搜索键
        $arr['s_val']       = $s_val;                   //搜索值
        $arr['empty']      = "<tr><td colspan='100' style='text-align:center'>没有任何数据</td></tr>";      //显示条数
        return $this->fetch('Node/node',$arr);
    }


    //添加功能
    public function postNodeDoAdd()
    {
        $id                     = input('id');                 //id
        $data['title']       = input('title');           //功能名称
        $data['cont']        = input('cont');            //控制器
        $data['fun']         = input('fun');             //方法

        $table = $this->dbt.'admin_node';
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
    public function postNodecon()
    {
        $data['nid']   = input('id');                 //id
        $type                = input('type');              //标题
        $data['rid'] = input('level');

        if($type == 2){
            $bool = DB::table($this->dbt.'admin_dis')->where($data)->delete();
        }else{
            $bool = DB::table($this->dbt.'admin_dis')->insert($data);
        }

        echo $bool?'更换成功':'更换失败';
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
