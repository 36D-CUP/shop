<?php /*a:2:{s:56:"F:\wamp64\www\shop\application\admin\view\Role\role.html";i:1537848516;s:64:"F:\wamp64\www\shop\application\admin\view\Indexpublic\index.html";i:1538198545;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="keywords" content="admin, dashboard, bootstrap, template, flat, modern, theme, responsive, fluid, retina, backend, html5, css, css3">
  <meta name="description" content="">
  <meta name="author" content="ThemeBucket">
  <link rel="shortcut icon" href="#" type="image/png">

  <title><?php echo htmlentities($title); ?></title>

  <!--icheck-->
<!--   <link href="/shop/public/static/admin/js/iCheck/skins/minimal/minimal.css" rel="stylesheet">
  <link href="/shop/public/static/admin/js/iCheck/skins/square/square.css" rel="stylesheet">
  <link href="/shop/public/static/admin/js/iCheck/skins/square/red.css" rel="stylesheet">
  <link href="/shop/public/static/admin/js/iCheck/skins/square/blue.css" rel="stylesheet"> -->

  <!--dashboard calendar 屏蔽1-->
  <!-- <link href="/shop/public/static/admin/css/clndr.css" rel="stylesheet"> -->

  <!--Morris Chart CSS 屏蔽1-->
  <!-- <link rel="stylesheet" href="/shop/public/static/admin/js/morris-chart/morris.css"> -->

  <!--common-->
  <link href="/shop/public/static/admin/css/style.css" rel="stylesheet">
  <link href="/shop/public/static/admin/css/style-responsive.css" rel="stylesheet">
<script src="/shop/public/static/admin/js/jquery-1.10.2.min.js"></script>




  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="/shop/public/static/admin/js/html5shiv.js"></script>
  <script src="/shop/public/static/admin/js/respond.min.js"></script>
  <![endif]-->
</head>

<body class="sticky-header">

<section>
    <!-- left side start-->
    <div class="left-side sticky-left-side">

        <!--logo and iconic logo start-->
        <div class="logo">
            <a href="index.html"><img src="/shop/public/static/admin/images/logo.png" alt=""></a>
        </div>

        <div class="logo-icon text-center">
            <a href="index.html"><img src="/shop/public/static/admin/images/logo_icon.png" alt=""></a>
        </div>
        <!--logo and iconic logo end-->

        <div class="left-side-inner">

            <!-- visible to small devices only -->
            <div class="visible-xs hidden-sm hidden-md hidden-lg">
                <div class="media logged-user">
                    <img alt="" src="<?php echo htmlentities($_SESSION['admin_img']); ?>" class="media-object">
                    <div class="media-body">
                        <h4><a href="#"><?php echo htmlentities($_SESSION['admin_user']); ?></a></h4>
                        <span>"欢迎登陆"</span>
                    </div>
                </div>

                <h5 class="left-nav-title" style = 'text-align: center'>信息管理</h5>
                <ul class="nav nav-pills nav-stacked custom-nav">

                  <li><a href="/shop/public/login/Logout"><i class="fa fa-sign-out"></i> <span>退出</span></a></li>
                </ul>
            </div>

            <!--sidebar nav start-->
            <ul class="nav nav-pills nav-stacked custom-nav">
                <li class="active click_nav thisNav" thisNav = 'nav' thisTitle = 'index'><a href="/shop/public/admin/index"><i class="fa fa-home"></i> <span>主页</span></a></li>
                <li class="menu-list thisNav" thisNav = 'nav'><a href=""><i class="fa fa-laptop"></i> <span>管理员</span></a>
                    <ul class="sub-menu-list">
                        <li class = 'click_nav' thisTitle = 'admin'><a href="/shop/public/admin/admin"> 管理员列表</a></li>
                        <li class = 'click_nav' thisTitle = 'adminadd'><a href="/shop/public/admin/adminadd"> 管理员添加</a></li>
                        <li class = 'click_nav' thisTitle = 'role'><a href="/shop/public/role/role"> 角色列表</a></li>
                        <li class = 'click_nav' thisTitle = 'node'><a href="/shop/public/node/node"> 权限分配列表</a></li>
                    </ul>
                </li>
                <li class="menu-list thisNav" thisNav = 'nav'><a href=""><i class="fa fa-laptop"></i> <span>公告管理</span></a>
                    <ul class="sub-menu-list">
                        <li class = 'click_nav' thisTitle = 'notice'><a href="/shop/public/notice/notice"> 公告列表</a></li>
                        <li class = 'click_nav' thisTitle = 'noticeadd'><a href="/shop/public/notice/noticeadd"> 公告添加</a></li>
                    </ul>
                </li>
                <li class="menu-list thisNav" thisNav = 'nav'><a href=""><i class="fa fa-laptop"></i> <span>用户管理</span></a>
                    <ul class="sub-menu-list">
                        <li class = 'click_nav' thisTitle = 'user'><a href="/shop/public/user/user"> 用户列表</a></li>
                        <li class = 'click_nav' thisTitle = 'useradd'><a href="/shop/public/user/useradd"> 用户添加</a></li>
                    </ul>
                </li>
                <li class="thisNav click_nav" thisTitle = 'out' thisNav = 'nav'><a href="/shop/public/login/Logout"><i class="fa fa-sign-in"></i> <span>退出</span></a></li>

            </ul>
            <!--sidebar nav end-->

        </div>
    </div>

    <!-- 定义本地缓存 -->
    <!--     用法:
        一层li的加入类 thisNav click_nav  和 加入属性thisTitle='名字' 和 thisNav = 'nav';
        有子层的
            在本层li加入类thisNav  和 加入属性thisNav = 'nav';
            在子层li加入类名click_nav 和 加入属性thisTitle='名字'; 
    -->
    <script type="text/javascript">
        var storage=window.localStorage;
        //判断是否存在本地缓存
        if (!storage.navig) {
            storage.navig = 'index';
        }else{
            var thisLi = $(".click_nav[thisTitle='"+storage.navig+"']");
            $('.click_nav').removeClass('active');
            $('.click_nav').removeClass('nav-active');

            //判断是否是只有一层
            if(thisLi.attr('thisNav') == 'nav'){
                thisLi.addClass('active');
            }else{
                thisLi.addClass('active');
                thisLi.parents('.thisNav').addClass('active');
            }
        }
        //单击导航
        $('body').on('click','.click_nav',function(){
            //获取自身名称
            var name = $(this).attr('thisTitle');
            //重新定义位置
            storage.navig = name;
        });
    </script>




    <!-- left side end-->
    
    <!-- main content start-->
    <div class="main-content" >

        <!-- header section start-->
        <div class="header-section">

            <!--toggle button start-->
            <a class="toggle-btn"><i class="fa fa-bars"></i></a>

            <script type="text/javascript">
                //缩略左侧导航栏
                $('.toggle-btn').click(function(){
                    var bodys = $('body').hasClass('left-side-collapsed');
                    if(!bodys){
                        $('.click_nav').removeClass('active');
                        $('.click_nav').removeClass('nav-active');
                        $('.thisNav').removeClass('active');
                    }else{
                        location.reload();
                    }
                });
            </script>
            <!--toggle button end-->

            <!--notification menu start -->
            <div class="menu-right">
                <ul class="notification-menu">
                    <li>
                        <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo htmlentities($_SESSION['admin_img']); ?>" alt="" />
                            <?php echo htmlentities($_SESSION['admin_user']); ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-usermenu pull-right">

                            <li><a href="/shop/public/login/Logout"><i class="fa fa-sign-out"></i>退出 </a></li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!--notification menu end -->

        </div>
        <!-- header section end-->

        <!-- page heading start-->
        <div class="page-heading">
            <h3>
                <?php echo htmlentities($title); ?>
            </h3>
            <ul class="breadcrumb">
                <li>
                    <a href="#"><?php echo htmlentities($title); ?></a>
                </li>
                <li class="active"> <?php echo htmlentities($title_txt); ?> </li>
            </ul>

        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <div class="wrapper">
            
<style>
td a{
  color:#fff !important;
}
td,th{
  text-align: center !important;
    vertical-align: middle !important;
}
.dataTables_info li{
  cursor:pointer;
}
</style>
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                <?php echo htmlentities($title_txt); ?>
<!-- <span class="tools pull-right">
<a href="javascript:;" class="fa fa-chevron-down"></a>收起
<a href="javascript:;" class="fa fa-times"></a>关闭
</span> -->
</header>
<div class="panel-body">
    <div class="row">
        <div class="col-lg-1" style = 'float:left'>
            <select class="selectpicker form-control" id = 'data_num' style = 'width: 60px;padding:0px !important;cursor:pointer;float:left;margin-right: 10px;'>
                <option value="10" <?php if(($data_num==10)): ?>selected<?php endif; ?>>10</option>
                <option value="15" <?php if(($data_num==15)): ?>selected<?php endif; ?>>15</option>
                <option value="20" <?php if(($data_num==20)): ?>selected<?php endif; ?>>20</option>
                <option value="x" <?php if(($data_num==x)): ?>selected<?php endif; ?>>全部</option>
            </select>
            <p style = 'line-height: 35px;'>
                条数
            </p>
        </div>
        <!-- 添加功能 start -->
        <button  class="btn btn-success layui-btn layui-btn-sm layui-btn-normal llbtn" data-toggle="modal" data-target="#myModal"  style ='margin-left: 12px;float:left'>添加新标签</button>
      <!-- 添加功能 end -->
        <div class="col-lg-3" style='float:right;margin-bottom: 10px;'>
            <form action = '' method="get">
                <div class="">
                    <select class="selectpicker form-control" name = 'search_type' style = 'width: 90px;padding:0px !important;cursor:pointer;float: left'>
                        <option value = 'id'           <?php if(($s_ty == 'id')): ?>          selected<?php endif; ?>> 系统Id     					</option>
                        <option value = 'title'   <?php if(($s_ty == 'title')): ?> 	selected<?php endif; ?>> 角色名称 						</option>
                    </select>
                    <input type="text" name = 'search_value' value = '<?php echo htmlentities($s_val); ?>' class = 'form-control' style = 'width: 180px;float: left;margin:0 5px;'>
                    <input type="hidden" value = '1' name = 'type'>
                    <button class = 'btn btn-default' style = 'float: left'>查询</button>
                </div>
            </form>
        </div>
    </div>
    <div class="adv-table">
        <table  class="display table table-bordered table-striped" id="dynamic-table">
            <thead>
                <tr>
                    <th style = 'width:80px'>系统ID</th>
                    <th >角色名称(双击修改)</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($row) || $row instanceof \think\Collection || $row instanceof \think\Paginator): $i = 0; $__LIST__ = $row;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?>
                <tr class="gradeX">
                    <td><?php echo htmlentities($row['id']); ?></td>
                    <td  class = 'double_updata_txt' tableName='title' thisID="<?php echo htmlentities($row['id']); ?>" clickTable = '<?php echo htmlentities($table); ?>' clickRes = '/shop/public/<?php echo htmlentities($con); ?>/double_updata_txt'><?php echo htmlentities($row['title']); ?></td>
                    <td>
                        <a href="javascript:;" class = 'btn btn-warning btn-sm click_delete' thisID="<?php echo htmlentities($row['id']); ?>" clickRes = '/shop/public/<?php echo htmlentities($con); ?>/Click_delete' clickTable = '<?php echo htmlentities($table); ?>'>删除</a>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "$empty" ;endif; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>系统ID</th>
                    <th>角色名称</th>
                    <th>操作</th>
                </tr>
            </tfoot>
        </table>
        <!--分页-->
        <div class="row">
            <div class="col-lg-6">
                <div class="dataTables_info" id="editable-sample_info">
                    <div class="dataTables_paginate paging_bootstrap pagination" id = 'page'>

                        <ul>
                            <li><a  class="prev" name = '1'>← 第一页</a></li>
                            <?php $__FOR_START_17752__=$pros;$__FOR_END_17752__=$proe;for($i=$__FOR_START_17752__;$i < $__FOR_END_17752__;$i+=1){ ?>
                            <li ><a  <?php if(($pro == $i)): ?> style = 'background: #65cea7;color:#fff'<?php endif; ?> name = '<?php echo htmlentities($i); ?>'><?php echo htmlentities($i); ?></a></li>
                            <?php } ?>
                            <li ><a class="next" name = '<?php echo htmlentities($page); ?>'>最后一页 → </a></li>
                            <li style = 'height:32px;line-height: 32px;padding:0 10px; '>总页数:<?php echo htmlentities($page); ?></li>
                            <li style = 'height:32px;line-height: 32px;padding:0 10px; '>总条数:<?php echo htmlentities($nums); ?></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <!--分页 end-->
    </div>
</div>

 <!--模态框-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" id = 'form' aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <form enctype="multipart/form-data" action = '' id="upForm" method='post'>
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel">
                          添加角色名
                      </h4>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id = 'close'>
                      </button>
                  </div>
                  <div class="modal-body" style = 'margin-bottom:30px;height:160px;'>

                      <div class="form-group" style = ''>
                          <label class="col-sm-3 col-sm-3 control-label " style ='margin-top: 5px;'><font style="vertical-align: inherit;">角色名</font></label>
                          <div class="col-sm-9">
                              <input type="text" id="title" name = 'title' class="form-control tooltips myupdata"  data-trigger="hover" data-toggle="tooltip" title="" placeholder="请输入角色名" verName='true' data-original-title="请输入角色名" value = "">
                          </div>
                      </div>
                      <div style = 'height:30px;'></div>
                      
                  <div class="modal-footer">
                      <button value="提交" type="button" id="mt_add" class = 'btn btn-success'>添加</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                      </button>
                  </div>
              </div>
          </form>
      </div>
    <!-- 模态框 end -->



</section>
</div>
</div>
<script type="text/javascript">
    // 分页
    $("#page").on('click','li a',function(){
      var pro = $(this).attr('name');
      var search_type = "<?php echo htmlentities(app('request')->param('search_type')); ?>";
      var search_value = "<?php echo htmlentities(app('request')->param('search_value')); ?>";
      var data_num = "<?php echo htmlentities(app('request')->param('data_num')); ?>";
      var type = "<?php echo htmlentities(app('request')->param('type')); ?>";         //通过自定义函数getUrlParam(key);获取地址栏的参数
      window.location.href = '/shop/public/<?php echo htmlentities($con); ?>/<?php echo htmlentities($fun); ?>?data_num='+data_num+'&pro='+pro+'&search_type='+search_type+'&search_value='+search_value+'&type='+type;
  });
    //显示条数
    $('#data_num').change(function(){
      window.location.href="/shop/public/<?php echo htmlentities($con); ?>/<?php echo htmlentities($fun); ?>/data_num/"+$(this).val();
  });

$('#mt_add').click(function(event) {
　　//formdata储存异步上传数据
     var formData = new FormData($('form')[0]);
     var myupdata = $(this).parents('form').find('.myupdata');


     for(var i = 0 ; i<myupdata.length ; i++){
        formData.append(myupdata.eq(i).attr('name'),myupdata.eq(i).val());
     }

     //坑点: 无论怎么传数据,console.log(formData)都会显示为空,但其实值是存在的,f12查看Net tab可以看到数据被上传了
     $.ajax({
      url:'/shop/public/<?php echo htmlentities($con); ?>/<?php echo htmlentities($fun); ?>DoAdd',
      type: 'POST',
      data: formData,
      //这两个设置项必填
      contentType: false,
      processData: false,
      success:function(data){
        alert(data);
        location.reload();

      }
     })
 });
</script>

        </div>
        <!--body wrapper end-->

        <!--footer section start-->
        <footer>
            2014 &copy; AdminEx by ThemeBucket
        </footer>
        <!--footer section end-->


    </div>
    <!-- main content end-->
</section>

<!-- Placed js at the end of the document so the pages load faster -->
<!-- <script src="/shop/public/static/admin/js/jquery-ui-1.9.2.custom.min.js"></script> -->
<!-- <script src="/shop/public/static/admin/js/jquery-migrate-1.2.1.min.js"></script> -->
<!-- <script src="/shop/public/static/admin/js/bootstrap.min.js"></script> -->
<!-- <script src="/shop/public/static/admin/js/modernizr.min.js"></script> -->

<!-- 公共 -->
<script src="/shop/public/static/admin/js/jquery.nicescroll.js"></script>

<!--easy pie chart-->
<!-- <script src="/shop/public/static/admin/js/easypiechart/jquery.easypiechart.js"></script> -->
<!-- <script src="/shop/public/static/admin/js/easypiechart/easypiechart-init.js"></script> -->

<!--Sparkline Chart-->
<!-- <script src="/shop/public/static/admin/js/sparkline/jquery.sparkline.js"></script> -->
<!-- <script src="/shop/public/static/admin/js/sparkline/sparkline-init.js"></script> -->

<!--icheck -->
<!-- <script src="/shop/public/static/admin/js/iCheck/jquery.icheck.js"></script> -->
<!-- <script src="/shop/public/static/admin/js/icheck-init.js"></script> -->

<!-- jQuery Flot Chart-->
<!-- <script src="/shop/public/static/admin/js/flot-chart/jquery.flot.js"></script> -->
<!-- <script src="/shop/public/static/admin/js/flot-chart/jquery.flot.tooltip.js"></script> -->
<!-- <script src="/shop/public/static/admin/js/flot-chart/jquery.flot.resize.js"></script> -->


<!--仪表图-->
<!-- <script src="/shop/public/static/admin/js/morris-chart/morris.js"></script>
<script src="/shop/public/static/admin/js/morris-chart/raphael-min.js"></script> -->

<!--Calendar-->
<!-- <script src="/shop/public/static/admin/js/calendar/clndr.js"></script>
<script src="/shop/public/static/admin/js/calendar/evnt.calendar.init.js"></script>
<script src="/shop/public/static/admin/js/calendar/moment-2.2.1.js"></script> -->
<!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script> -->

<!--公共-->
<script src="/shop/public/static/admin/js/scripts.js"></script>

<!--Dashboard Charts-->
<!-- <script src="/shop/public/static/admin/js/dashboard-chart-init.js"></script> -->
<!--公共-->
<script src="/shop/public/static/admin/js/my.js"></script>


</body>
</html>
