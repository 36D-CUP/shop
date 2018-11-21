<?php /*a:2:{s:60:"F:\wamp64\www\lingtu\application\admin\view\Admin\index.html";i:1537940598;s:66:"F:\wamp64\www\lingtu\application\admin\view\Indexpublic\index.html";i:1538198545;}*/ ?>
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
            
<!--仪表图-->
<script src="/lingtu/public/static/myshop_admin/js/morris-chart/morris.js"></script>
<script src="/lingtu/public/static/myshop_admin/js/morris-chart/raphael-min.js"></script>
<div class="wrapper">
	<div class="row">
		<div class="col-md-6">
			<!--statistics start-->
			<div class="row state-overview">
				<div class="col-md-6 col-xs-12 col-sm-6">
					<div class="panel purple">
						<div class="symbol">
							<i class="fa fa-gavel"></i>
						</div>
						<div class="state-value">
							<div class="value"><?php echo htmlentities($admin_num); ?></div>
							<div class="title">管理员总数</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-xs-12 col-sm-6">
					<div class="panel red">
						<div class="symbol">
							<i class="fa fa-tags"></i>
						</div>
						<div class="state-value">
							<div class="value"><?php echo htmlentities($notice_num); ?></div>
							<div class="title">文章总数</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row state-overview">
				<div class="col-md-6 col-xs-12 col-sm-6">
					<div class="panel blue">
						<div class="symbol">
							<i class="fa fa-money"></i>
						</div>
						<div class="state-value">
							<div class="value"><?php echo htmlentities($admin_status_num); ?></div>
							<div class="title">被禁管理员总数</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-xs-12 col-sm-6">
					<div class="panel green">
						<div class="symbol">
							<i class="fa fa-eye"></i>
						</div>
						<div class="state-value">
							<div class="value"><?php echo htmlentities($notice_status_num); ?></div>
							<div class="title">被禁文章总数</div>
						</div>
					</div>
				</div>
			</div>
			<!--statistics end-->
		</div>
		<div class="col-md-6">
			<!--more statistics box start-->
			<div class="panel deep-purple-box">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-7 col-sm-7 col-xs-7">
							<div id="graph-donut" class="revenue-graph"></div>

						</div>
						<div class="col-md-5 col-sm-5 col-xs-5">
							<ul class="bar-legend">
								<li><span class="green"></span> 无敌管理员:<?php echo htmlentities($level[0]['num']); ?></li>
								<li><span class="purple"></span> 一级管理员:<?php echo htmlentities($level[1]['num']); ?></li>
								<li><span class="blue"></span> 二级管理员:<?php echo htmlentities($level[2]['num']); ?></li>
								<li><span class="red"></span> 三级管理员:<?php echo htmlentities($level[3]['num']); ?></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!--more statistics box end-->
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    Morris.Donut({
    element: 'graph-donut',
    data: [
        {value: "<?php echo htmlentities($level[0]['num']); ?>", label: "<?php echo htmlentities($level[0]['title']); ?>", formatted: "人数<?php echo htmlentities($level[0]['num']); ?>人" },
        {value: "<?php echo htmlentities($level[1]['num']); ?>", label: "<?php echo htmlentities($level[1]['title']); ?>", formatted: "人数<?php echo htmlentities($level[1]['num']); ?>人" },
        {value: "<?php echo htmlentities($level[2]['num']); ?>", label: "<?php echo htmlentities($level[2]['title']); ?>", formatted: "人数<?php echo htmlentities($level[2]['num']); ?>人" },
        {value: "<?php echo htmlentities($level[3]['num']); ?>", label: "<?php echo htmlentities($level[3]['title']); ?>", formatted: "人数<?php echo htmlentities($level[3]['num']); ?>人" },
    ],
    backgroundColor: false,
    labelColor: '#fff',
    colors: [
        '#4acacb','#6a8bc0','#5ab6df','#fe8676'
    ],
    formatter: function (x, data) { return data.formatted; }
	});
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
