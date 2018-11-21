<?php /*a:2:{s:65:"F:\wamp64\www\lingtu\application\admin\view\Notice\noticeadd.html";i:1538198640;s:66:"F:\wamp64\www\lingtu\application\admin\view\Indexpublic\index.html";i:1538198545;}*/ ?>
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
            

<link href="/lingtu/public/static/admin/css/fileinput.min.css" rel="stylesheet"><!-- 上传 -->
<script src="/lingtu/public/static/admin/js/fileinput.min.js"></script><!-- 上传 -->
<script type="text/javascript" src="/lingtu/public/static/wangEditor/release/wangEditor.min.js"></script><!-- 富文本编辑器 -->
<style type="text/css">

</style>
<div class="row">
    <section class="panel">
        <header class="panel-heading" style = 'text-align: center;font-size:32px;height:100px;line-height: 80px;'>
            <?php echo htmlentities($title_txt); ?>
        </header>
        <div class="panel-body">
            <form class="form-horizontal adminex-form" method="get">

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">主图(3兆内)</label>
                    <div class="col-sm-10">
                        <?php if(($img)): ?><img style = 'width:200px;margin:10px' src = "<?php echo htmlentities($img); ?>"><?php endif; ?>
                        <input name = 'imgs[]' id="file-aa" type="file" class="file" data-overwrite-initial="false" ><!-- multiple  -->
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">标题</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control tooltips myupdata" name = 'title' data-trigger="hover" data-toggle="tooltip" title="" placeholder="标题" data-original-title="请输入标题" value="<?php echo htmlentities($row['title']); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">简略</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control tooltips myupdata" name = 'brief' data-trigger="hover" data-toggle="tooltip" title="" placeholder="简略" data-original-title="请输入简略" value="<?php echo htmlentities($row['brief']); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">内容</label>
                    <div class="col-sm-10">
                        <div id="editor">
                            <?php echo $row['content']; ?>
                        </div>
                    </div>
                </div>



                <!-- 隐藏id -->
                <input type="hidden" class = 'myupdata' name = 'id' value="<?php echo htmlentities($row['id']); ?>">
                <div  style="height: 80px;">
                    <button class = 'btn btn-success' type = 'button' id = 'valiSub' onclick= '' style = 'display:block;margin:0 auto;width: 120px;margin-top: 30px'>提交</button>
                </div>
            </form>
        </div>
    </section>
</div>
<script type="text/javascript">
$("#file-aa").fileinput({
    allowedFileExtensions : ['jpg', 'png','gif'],
    overwriteInitial: false,
    showUpload:false,
    maxFileSize: 3000,
    showUpload:false, 
    browseClass:"btn btn-success",
    maxFilesNum: 1,

    //allowedFileTypes: ['image', 'video', 'flash'],
    slugCallback: function(filename) {
        return filename.replace('(', '_').replace(']', '_');
    }
});

$(document).ready(function(){
    var outTradeNo="";  //随机号
    for(var i=0;i<10;i++) //6位随机数，用以加在时间戳后面。
    {
        outTradeNo += Math.floor(Math.random()*10);
    }
    var myDate = new Date();

    outTradeNo = '<?php echo htmlentities($row['randimg']); ?>';

    var E = window.wangEditor;
    var editor = new E('#editor');

    editor.customConfig.uploadImgShowBase64 = true ;//开启上传图片
    editor.customConfig.uploadImgMaxSize = 3 * 1024 * 1024;//图片大小
    editor.customConfig.uploadImgMaxLength = 100000;//图片上传的数量
    editor.customConfig.uploadImgServer  = '/lingtu/public/publics/Htmlimg/table/<?php echo htmlentities($table); ?>/id/'+outTradeNo ;
    editor.customConfig.debug = true

    // 或者 var editor = new E( document.getElementById('editor') )
    editor.create();

    $('#valiSub').click(function(event) {
        //formdata储存异步上传数据
        var formData = new FormData($('form')[0]);
        formData.append('imgs',$('#file-aa')[0].files);
        //富文本
        formData.append('content',editor.txt.html());
        formData.append('randimg','<?php echo htmlentities($row['randimg']); ?>');
        var myupdata = $(this).parents('form').find('.myupdata');
        for(var i = 0 ; i<myupdata.length ; i++){
            formData.append(myupdata.eq(i).attr('name'),myupdata.eq(i).val());
        }

        //坑点: 无论怎么传数据,console.log(formData)都会显示为空,但其实值是存在的,f12查看Net tab可以看到数据被上传了
        $.ajax({
            url:'/lingtu/public/<?php echo htmlentities($con); ?>/<?php echo htmlentities($fun); ?>',
            type: 'POST',
            data: formData,
            //这两个设置项必填
            contentType: false,
            processData: false,
            success:function(data){
                alert(data);
                if(data == '添加成功'){
                    if(confirm('是否继续添加?')){
                        location.reload();
                    }else{
                        window.location.href = '/lingtu/public/<?php echo htmlentities($con); ?>/<?php echo htmlentities($index); ?>';
                    }
                }else{
                    location.reload();
                }
            }
        })
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
