<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Db;
// 应用公共文件
//首页数据      -----------------------------------------------

    //分页数据,1.显示页数,2.数据数量,3当前页
    function pageindex($showNum , $num ,$pro){
        $arr_page = $showNum == 'x'?1:ceil($num/$showNum);           //获取条数
        $page = $arr_page;
        $arr_nums = $num;
        if($pro-2<=0){
            $arr_pros = 1;
            $arr_proe = $page<8?$page+1:8;
        }else if($pro+1>$page){
            $arr_pros = $page-4<=0?1:$pro-4;
            $arr_proe = $page+1;
        }else{
            $arr_pros = $pro-2<=0?1:$pro-2;
            $arr_proe = $page+1;
        }
        $arr['arr_page'] = $arr_page;
        $arr['arr_nums'] = $arr_nums;
        $arr['arr_pros'] = $arr_pros;
        $arr['arr_proe'] = $arr_proe;
        return $arr;
    }
//首页数据  end-------------------------------------------------


//基本操作 ---------------------------------------------------------


    //单击修改状态
    function Click_updata_status($id,$val,$key,$table)
    {
        if(Db::table($table)->where('id',$id)->update([$key  => $val])){
            return $val;
        }else{
            return '失败';
        }
    }


    //删除文件
    /*
        delete_file(对应表 , 对应表id , 指定图片img_path字段);

        table       对应的数据表
        id          对应数据表数据的id
        img_path    指定图片的img_path字段
                        存在  :删除所有图片
                        不存在  :删除指定图片
     */ 
    function delete_file($table , $id , $img_path="")
    {
        //判断是否有图片;
        $old_data['img_surface_name'] = $table;
        $old_data['img_surface_id']   = $id;
        $old_img  = DB::table('ms_img')->where($old_data)->select();                             //找出原图片
        if(empty($old_img)){
            return false;
        }

        //判断是否删除原图片
        if(empty($img_path)){
            //删除所有图片,数据
            $bool = Db::table('ms_img')->where($old_data)->delete();                                 //删除所有条件数据
            foreach ($old_img as $v) {
                @unlink('uploads/'.$table .'/'. $v['img_path']);   //删除原图片
            }

            if($bool){
                return true;
            }
        }else{
            $old_data['img_path'] = $img_path;
            $old_path = DB::table('ms_img')->where($old_data)->find()['img_path'];
            $bool     = Db::table('ms_img')->where($old_data)->delete();                             //删除指定条件数据
            @unlink('uploads/'.$table .'/'. $old_path);            //删除原图片

            if($bool){
                return true;
            }
        }

    }

    //文件上传
    /*
        upload_file(文件 , 对应表 , 对应表id , 是否删除原图片);

        files  文件
        table  对应的数据表
        id     对应数据表数据的id
        del    判断是否要删除原图片
                1:将原数据所有图片删除,换上新图片,例如头像,
                2:富文本编辑器的图片上传
     */ 
    function upload_file($files , $table , $id , $del=1)
    {
        //判断是否有图片;
        if(empty($files)){
            return false;
        }


        //判断是否删除原图片
        if($del == '1'){
            $old_data['img_surface_name'] = $table;
            $old_data['img_surface_id']   = $id;
            $old_img  = DB::table('ms_img')->where($old_data)->select();                             //找出原图片

            //删除所有图片,数据
            if(!empty($old_img)){
                Db::table('ms_img')->where($old_data)->delete();                                         //删除所有条件数据
                foreach ($old_img as $v) {
                    @unlink('uploads/'.$table .'/'. $v['img_path']);   //删除原图片
                }
            }

            $str_path = array();
            //插入新图片
            foreach($files as $file){
                $info = $file->move('uploads/'. $table);             //移动图片到指定目录

                $data_img['img_path']         = str_replace('\\','/',$info->getSaveName());           //获取路径,组合条件
                $data_img['img_surface_name'] = $table;
                $data_img['img_surface_id']   = $id;                                                        

                $str_path[] = $img['img_surface_name'].'/'.$img['img_path'];
                $bool = Db::table('ms_img')->where($old_data)->insert($data_img);                     //插入数据
            }

            if($bool){
                return $str_path;
            }

        }else if($del == '2'){
            $old_data['img_surface_name'] = $table;
            $old_data['img_surface_id']   = $id;
            $old_img  = DB::table('ms_img')->where($old_data)->select();                             //找出原图片



            $str_path = array();
            //插入新图片
            foreach($files as $file){

                $name = $file->getInfo()['name'];       //获取文件名
                $new_name = explode('.', $name);        //找出后缀
                $num = count($new_name);                //找出后缀

                $rand = time().rand(100000,999999);     //随机名字

                $info = $file->move('uploads/htmlimg/'. $table.'/'.$id,$rand.'.'.$new_name[$num-1]);             //移动图片到指定目录

                $data_img         = str_replace('\\','/',$info->getSaveName());           //获取路径,组合条件
                                              

                $str_path[] = 'htmlimg/'. $table.'/'.$id.'/'.$data_img ;
            }

                return $str_path;
        }

    }


    
    //发送短信验证码实例 $to 手机号
    function phone($to){
        Vendor("lib.Ucpaas");
        //填写在开发者控制台首页上的Account Sid
        $options['accountsid']='9f7617a3e188a60b3db596502d4864de';
        //填写在开发者控制台首页上的Auth Token
        $options['token']='9ce5bec6e5963f4f2749f284476e3c50';

        //初始化 $options必填
        $ucpass = new Ucpaas($options);
        $appid = "49cc314e07ac47d5b26a290282c0bd5f";    //应用的ID，可在开发者控制台内的短信产品下查看
        $templateid = "333873"; //模板id   //可在后台短信产品→选择接入的应用→短信模板-模板ID，查看该模板ID
        $param = rand(100000,999999);//验证码 //多个参数使用英文逗号隔开（如：param=“a,b,c”），如为参数则留空
        $mobile =$to;//电话
        $uid = "";
        //70字内（含70字）计一条，超过70字，按67字/条计费，超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。
        $datas = $ucpass->SendSms($appid,$templateid,$param,$mobile,$uid);
        $datas = json_decode($datas,true);
        if ($datas['code']=='000000') {
            $datas['params']=$param;
            return $datas;
        }else{
            return "";  
        }

    }
