<?php /*a:2:{s:62:"F:\wamp64\www\lingtu\application\admin\view\Notice\notice.html";i:1537504811;s:66:"F:\wamp64\www\lingtu\application\admin\view\Indexpublic\index.html";i:1538198545;}*/ ?>
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
<!--   <link href="/lingtu/public/static/admin/js/iCheck/skins/minimal/minimal.css" rel="stylesheet">
  <link href="/lingtu/public/static/admin/js/iCheck/skins/square/square.css" rel="stylesheet">
  <link href="/lingtu/public/static/admin/js/iCheck/skins/square/red.css" rel="stylesheet">
  <link href="/lingtu/public/static/admin/js/iCheck/skins/square/blue.css" rel="stylesheet"> -->

  <!--dashboard calendar 屏蔽1-->
  <!-- <link href="/lingtu/public/static/admin/css/clndr.css" rel="stylesheet"> -->

  <!--Morris Chart CSS 屏蔽1-->
  <!-- <link rel="stylesheet" href="/lingtu/public/static/admin/js/morris-chart/morris.css"> -->

  <!--common-->
  <link href="/lingtu/public/static/admin/css/style.css" rel="stylesheet">
  <link href="/lingtu/public/static/admin/css/style-responsive.css" rel="stylesheet">
<script src="/lingtu/public/static/admin/js/jquery-1.10.2.min.js"></script>




  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="/lingtu/public/static/admin/js/html5shiv.js"></script>
  <script src="/lingtu/public/static/admin/js/respond.min.js"></script>
  <![endif]-->
</head>

<body class="sticky-header">

<section>
    <!-- left side start-->
    <div class="left-side sticky-left-side">

        <!--logo and iconic logo start-->
        <div class="logo">
            <a href="index.html"><img src="/lingtu/public/static/admin/images/logo.png" alt=""></a>
        </div>

        <div class="logo-icon text-center">
            <a href="index.html"><img src="/lingtu/public/static/admin/images/logo_icon.png" alt=""></a>
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

                  <li><a href="/lingtu/public/login/Logout"><i class="fa fa-sign-out"></i> <span>退出</span></a></li>
                </ul>
            </div>

            <!--sidebar nav start-->
            <ul class="nav nav-pills nav-stacked custom-nav">
                <li class="active click_nav thisNav" thisNav = 'nav' thisTitle = 'index'><a href="/lingtu/public/admin/index"><i class="fa fa-home"></i> <span>主页</span></a></li>
                <li class="menu-list thisNav" thisNav = 'nav'><a href=""><i class="fa fa-laptop"></i> <span>管理员</span></a>
                    <ul class="sub-menu-list">
                        <li class = 'click_nav' thisTitle = 'admin'><a href="/lingtu/public/admin/admin"> 管理员列表</a></li>
                        <li class = 'click_nav' thisTitle = 'adminadd'><a href="/lingtu/public/admin/adminadd"> 管理员添加</a></li>
                        <li class = 'click_nav' thisTitle = 'role'><a href="/lingtu/public/role/role"> 角色列表</a></li>
                        <li class = 'click_nav' thisTitle = 'node'><a href="/lingtu/public/node/node"> 权限分配列表</a></li>
                    </ul>
                </li>
                <li class="menu-list thisNav" thisNav = 'nav'><a href=""><i class="fa fa-laptop"></i> <span>公告管理</span></a>
                    <ul class="sub-menu-list">
                        <li class = 'click_nav' thisTitle = 'notice'><a href="/lingtu/public/notice/notice"> 公告列表</a></li>
                        <li class = 'click_nav' thisTitle = 'noticeadd'><a href="/lingtu/public/notice/noticeadd"> 公告添加</a></li>
                    </ul>
                </li>
                <li class="menu-list thisNav" thisNav = 'nav'><a href=""><i class="fa fa-laptop"></i> <span>用户管理</span></a>
                    <ul class="sub-menu-list">
                        <li class = 'click_nav' thisTitle = 'user'><a href="/lingtu/public/user/user"> 用户列表</a></li>
                        <li class = 'click_nav' thisTitle = 'useradd'><a href="/lingtu/public/user/useradd"> 用户添加</a></li>
                    </ul>
                </li>
                <li class="thisNav click_nav" thisTitle = 'out' thisNav = 'nav'><a href="/lingtu/public/login/Logout"><i class="fa fa-sign-in"></i> <span>退出</span></a></li>

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

                            <li><a href="/lingtu/public/login/Logout"><i class="fa fa-sign-out"></i>退出 </a></li>
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
        <div class="col-lg-3" style = 'float:left'>
            <select class="selectpicker form-control" id = 'data_num' style = 'width: 80px;padding:0px !important;cursor:pointer;float:left;margin-right: 10px;'>
                <option value="10" <?php if(($data_num==10)): ?>selected<?php endif; ?>>10</option>
                <option value="15" <?php if(($data_num==15)): ?>selected<?php endif; ?>>15</option>
                <option value="20" <?php if(($data_num==20)): ?>selected<?php endif; ?>>20</option>
                <option value="x" <?php if(($data_num==x)): ?>selected<?php endif; ?>>全部</option>
            </select>
            <p style = 'line-height: 35px;'>
                显示条数
            </p>
        </div>
        <div class="col-lg-3" style='float:right;margin-bottom: 10px;'>
            <form action = '' method="get">
                <div class="">
                    <select class="selectpicker form-control" name = 'search_type' style = 'width: 90px;padding:0px !important;cursor:pointer;float: left'>
                        <option value = 'id'           <?php if(($s_ty == 'id')): ?>          selected<?php endif; ?>> 系统Id     					</option>
                        <option value = 'title'   <?php if(($s_ty == 'title')): ?> 	selected<?php endif; ?>> 标题 						</option>
                        <option value = 'brief'   <?php if(($s_ty == 'brief')): ?> 		selected<?php endif; ?>> 缩略  					</option>
                        <option value = 'status'       <?php if(($s_ty == 'status')): ?> 	selected<?php endif; ?>> 状态(1为正常,2为暂停)  </option>
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
                    <th style = 'width:100px'>公告主图</th>
                    <th>公告标题</th>
                    <th>公告缩略</th>
                    <th>排序</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($row) || $row instanceof \think\Collection || $row instanceof \think\Paginator): $i = 0; $__LIST__ = $row;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?>
                <tr class="gradeX">
                    <td><?php echo htmlentities($row['id']); ?></td>
                    <td><img  style = 'width:100px;'src = "<?php echo htmlentities($row['img']); ?>"></td> 
                    <td><?php echo htmlentities($row['title']); ?></td>
                    <td class = 'double_updata_txt' tableName='brief' thisID="<?php echo htmlentities($row['id']); ?>" clickTable = '<?php echo htmlentities($table); ?>' clickRes = '/lingtu/public/<?php echo htmlentities($con); ?>/double_updata_txt'><?php echo htmlentities($row['brief']); ?></td>
                    <td><?php echo htmlentities($row['sort']); ?></td>
                    <td>
                        <a href="#" class = "click_updata_status btn <?php if(($row['status']==1)): ?>btn-success<?php else: ?>btn-primary<?php endif; ?> btn-sm" clickStatusKey ='status' thisID = "<?php echo htmlentities($row['id']); ?>" clickTable = '<?php echo htmlentities($table); ?>'  clickRes = '/lingtu/public/<?php echo htmlentities($con); ?>/click_updata_status' clickStatus="<?php echo htmlentities($row['status']); ?>" style ='color:#fff' clickq = '正常' clickj= '禁用'>
                            <?php if(($row['status']==1)): ?>
                                正常
                            <?php else: ?>
                                禁用
                            <?php endif; ?>
                        </a>
                    </td>
                    <td>
                        <a  href="/lingtu/public/<?php echo htmlentities($con); ?>/<?php echo htmlentities($fun); ?>add/id/<?php echo htmlentities($row['id']); ?>"  class = 'btn btn-success btn-sm'>编辑</a>
                        <a href="javascript:;" class = 'btn btn-warning btn-sm click_delete' thisID="<?php echo htmlentities($row['id']); ?>" clickRes = '/lingtu/public/<?php echo htmlentities($con); ?>/Click_delete' clickTable = '<?php echo htmlentities($table); ?>'>删除</a>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "$empty" ;endif; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>系统ID</th>
                    <th>公告主图</th>
                    <th>公告标题</th>
                    <th>公告缩略</th>
                    <th>排序</th>
                    <th>状态</th>
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
                            <?php $__FOR_START_22717__=$pros;$__FOR_END_22717__=$proe;for($i=$__FOR_START_22717__;$i < $__FOR_END_22717__;$i+=1){ ?>
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
      window.location.href = '/lingtu/public/<?php echo htmlentities($con); ?>/<?php echo htmlentities($fun); ?>?data_num='+data_num+'&pro='+pro+'&search_type='+search_type+'&search_value='+search_value+'&type='+type;
  });
    //显示条数
    $('#data_num').change(function(){
      window.location.href="/lingtu/public/<?php echo htmlentities($con); ?>/<?php echo htmlentities($fun); ?>/data_num/"+$(this).val();
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
<!-- <script src="/lingtu/public/static/admin/js/jquery-ui-1.9.2.custom.min.js"></script> -->
<!-- <script src="/lingtu/public/static/admin/js/jquery-migrate-1.2.1.min.js"></script> -->
<!-- <script src="/lingtu/public/static/admin/js/bootstrap.min.js"></script> -->
<!-- <script src="/lingtu/public/static/admin/js/modernizr.min.js"></script> -->

<!-- 公共 -->
<script src="/lingtu/public/static/admin/js/jquery.nicescroll.js"></script>

<!--easy pie chart-->
<!-- <script src="/lingtu/public/static/admin/js/easypiechart/jquery.easypiechart.js"></script> -->
<!-- <script src="/lingtu/public/static/admin/js/easypiechart/easypiechart-init.js"></script> -->

<!--Sparkline Chart-->
<!-- <script src="/lingtu/public/static/admin/js/sparkline/jquery.sparkline.js"></script> -->
<!-- <script src="/lingtu/public/static/admin/js/sparkline/sparkline-init.js"></script> -->

<!--icheck -->
<!-- <script src="/lingtu/public/static/admin/js/iCheck/jquery.icheck.js"></script> -->
<!-- <script src="/lingtu/public/static/admin/js/icheck-init.js"></script> -->

<!-- jQuery Flot Chart-->
<!-- <script src="/lingtu/public/static/admin/js/flot-chart/jquery.flot.js"></script> -->
<!-- <script src="/lingtu/public/static/admin/js/flot-chart/jquery.flot.tooltip.js"></script> -->
<!-- <script src="/lingtu/public/static/admin/js/flot-chart/jquery.flot.resize.js"></script> -->


<!--仪表图-->
<!-- <script src="/lingtu/public/static/admin/js/morris-chart/morris.js"></script>
<script src="/lingtu/public/static/admin/js/morris-chart/raphael-min.js"></script> -->

<!--Calendar-->
<!-- <script src="/lingtu/public/static/admin/js/calendar/clndr.js"></script>
<script src="/lingtu/public/static/admin/js/calendar/evnt.calendar.init.js"></script>
<script src="/lingtu/public/static/admin/js/calendar/moment-2.2.1.js"></script> -->
<!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script> -->

<!--公共-->
<script src="/lingtu/public/static/admin/js/scripts.js"></script>

<!--Dashboard Charts-->
<!-- <script src="/lingtu/public/static/admin/js/dashboard-chart-init.js"></script> -->
<!--公共-->
<script src="/lingtu/public/static/admin/js/my.js"></script>


</body>
</html>
