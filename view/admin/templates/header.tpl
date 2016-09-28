<!DOCTYPE html>

<!-- Mirrored from demo.themepixels.com/webpage/katniss/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Jul 2015 09:21:11 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Katniss Premium Admin Template</title>
    <link rel="stylesheet" href="{SITE-NAME}/view/admin/Themes/css/style.default.css" type="text/css"/>
    <link rel="stylesheet" href="{SITE-NAME}/view/admin/Themes/css/prettify.css" type="text/css"/>
    <script type="text/javascript" src="{SITE-NAME}/view/admin/Themes/js/prettify.js"></script>
    <script type="text/javascript" src="{SITE-NAME}/view/admin/Themes/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="{SITE-NAME}/view/admin/Themes/js/jquery-migrate-1.1.1.min.js"></script>
    <script type="text/javascript" src="{SITE-NAME}/view/admin/Themes/js/jquery-ui-1.9.2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#DanhMuc1Id").change(function() {
                $.post('{SITE-NAME}/controller/default/ajax.php',
                        {
                            Tour:$('#DanhMuc1Id  option:selected').val()
                        },
                        function(data,status){
                            $("#DanhMuc2Id").html(data);
                        });
            });

        });

        //
    </script>
    <script type="text/javascript" src="{SITE-NAME}/view/admin/Themes/js/jquery.flot.min.js"></script>
    <script type="text/javascript" src="{SITE-NAME}/view/admin/Themes/js/jquery.flot.resize.min.js"></script>
    <script type="text/javascript" src="{SITE-NAME}/view/admin/Themes/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{SITE-NAME}/view/admin/Themes/js/jquery.uniform.min.js"></script>
    <script type="text/javascript" src="{SITE-NAME}/view/admin/Themes/js/modernizr.min.js"></script>
    <script type="text/javascript" src="{SITE-NAME}/view/admin/Themes/js/detectizr.min.js"></script>
    <script type="text/javascript" src="{SITE-NAME}/view/admin/Themes/js/jquery.cookie.js"></script>
    <script type="text/javascript" src="{SITE-NAME}/view/admin/Themes/js/custom.js"></script>
    <!--[if lte IE 8]>
    <script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
    <script type="text/javascript">
        var sitename='{SITE-NAME}';
    </script>
    <script type="text/javascript" src="{SITE-NAME}/view/admin/Themes/ckeditor/ckeditor.js"></script>
    <!-- chát face
    -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
    <style>#cfacebook{position:fixed;bottom:0px;right:100px;z-index:999999999999999;width:250px;height:auto;box-shadow:6px 6px 6px 10px rgba(0,0,0,0.2);border-top-left-radius:5px;border-top-right-radius:5px;overflow:hidden;}#cfacebook .fchat{float:left;width:100%;height:270px;overflow:hidden;display:none;background-color:#fff;}#cfacebook .fchat .fb-page{margin-top:-130px;float:left;}#cfacebook a.chat_fb{float:left;padding:0 25px;width:250px;color:#fff;text-decoration:none;height:40px;line-height:40px;text-shadow:0 1px 0 rgba(0,0,0,0.1);background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAqCAMAAABFoMFOAAAAWlBMV…8/UxBxQDQuFwlpqgBZBq6+P+unVY1GnDgwqbD2zGz5e1lBdwvGGPE6OgAAAABJRU5ErkJggg==);background-repeat:repeat-x;background-size:auto;background-position:0 0;background-color:#3a5795;border:0;border-bottom:1px solid #133783;z-index:9999999;margin-right:12px;font-size:18px;}#cfacebook a.chat_fb:hover{color:yellow;text-decoration:none;}</style>
    <script>
        jQuery(document).ready(function () {
            jQuery(".chat_fb").click(function() {
                jQuery('.fchat').toggle('slow');
            });
        });
    </script>
    <div id="cfacebook">
        <a href="javascript:;" class="chat_fb" onclick="return:false;"><i class="fa fa-facebook-square"></i> Phản hồi của bạn</a>
        <div class="fchat">
            <div class="fb-page" data-tabs="messages" data-href="https://www.facebook.com/Handmade-Video-533414156699825" data-width="250" data-height="400" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"></div>
        </div>
    </div>

</head>

<body>

<div class="mainwrapper">

    <!-- START OF LEFT PANEL -->
    <div class="leftpanel">

        <div class="logopanel" style="text-align: center!important;">
           <a href="http://vifonic.com/"><img style="height: 36px" src="{SITE-NAME}/view/admin/Themes/images/logo.png" title="Hệ thống quản trị của Vifonic.com" alt="Hệ thống quản trị của Vifonic.com"></a>
        </div>
        <!--logopanel-->

        <div class="datewidget"><iframe scrolling="no" frameborder="no" style="overflow:hidden;border:0;margin:0;padding:0;width:235px;height:45px;"src="http://clocklink.com/html5embed.php?clock=lat&timezone=ICT&color=gray&size=235&Title=&Message=&Target=&From=2015,1,1,0,0,0&Color=gray"></iframe></div>

        <div class="searchwidget">
            <form action="" method="post">
                <div class="input-append">
                    <input type="text" class="span2 search-query" placeholder="Tìm kiếm...">
                    <button type="submit" class="btn"><span class="icon-search"></span></button>
                </div>
            </form>
        </div>
        <!--searchwidget-->


        <!--plainwidget-->

        <div class="leftmenu">
            <ul class="nav nav-tabs nav-stacked">
                <li class="nav-header">Main Navigation</li>
                <li class="{kichhoat}"><a href="{SITE-NAME}/admin"><span class="icon-align-justify"></span> Dashboard</a></li>
                <li class="{kichhoat_lienhe}"><a href="{SITE-NAME}/controller/admin/language.php"><span class="icon-language"></span> Ngôn ngữ</a></li>
                <li class="{kichhoat_admin}" ><a href="{SITE-NAME}/controller/admin/admin.php"><span class="icon-user"></span> Tài khoản quản trị</a></li>
                <li class="{kichhoat_config}"><a href="{SITE-NAME}/controller/admin/config.php"><span class=" icon-wrench"></span> Cấu hình hệ thống</a></li>
                <li class="{kichhoat_dathang}"><a href="{SITE-NAME}/controller/admin/booking_tour.php"><span class="icon-shopping-cart"></span> Đặt tour</a></li>
                <li class="{kichhoat_lienhe}"><a href="{SITE-NAME}/controller/admin/contact.php"><span class="icon-envelope"></span> Liên hệ</a></li>

                <li class="dropdown {kichhoat_tintuc}"><a href="#"><span class=" icon-edit"></span> Tin tức</a>
                    <ul>
                        <li><a href="{SITE-NAME}/controller/admin/danhmuc_tintuc.php">Danh mục</a></li>
                        <li><a href="{SITE-NAME}/controller/admin/new.php">Danh sách </a></li>
                    </ul>
                </li>

                <li class="dropdown {kichhoat_dichvu}" ><a href="#"><span class=" icon-plane"></span> Tour du lịch</a>
                    <ul>
                        <li><a href="{SITE-NAME}/controller/admin/danhmuc_2.php">Danh mục</a></li>
                        <li><a href="{SITE-NAME}/controller/admin/tour.php">Danh sách </a></li>
                    </ul>
                </li>

                <li class="dropdown {kichhoat_gioithieu}"><a href="#"><span class=" icon-signal"></span> Giới thiệu</a>
                    <ul>
                        <li><a href="{SITE-NAME}/controller/admin/danhmucgioithieu.php">Danh mục</a></li>
                        <li><a href="{SITE-NAME}/controller/admin/tuyendung.php">Danh sách </a></li>
                    </ul>
                </li>
                <li class="dropdown {kichhoat_gioithieu}"><a href="#"><span class="icon-question-sign"></span> Hỗ trợ trực tuyến</a>
                    <ul>
                        <li><a href="{SITE-NAME}/controller/admin/danhmuc_subport.php">Danh mục</a></li>
                        <li><a href="{SITE-NAME}/controller/admin/subport.php">Danh sách </a></li>
                    </ul>
                </li>
                <li class="{kichhoat_video}"><a href="{SITE-NAME}/controller/admin/video.php"><span class="icon-facetime-video"></span> Video</a></li>
                <li class="{kichhoat_slide}"><a href="{SITE-NAME}/controller/admin/slide.php"><span class="icon-film"></span> Slide</a></li>
                <li class="{kichhoat_menu}"><a href="{SITE-NAME}/controller/admin/menu.php"><span class="icon-th-list"></span> Cấu hình menu</a></li>
                <li class="{kichhoat_mangxahoi}"><a href="{SITE-NAME}/controller/admin/mangxahoi.php"><span class=" iconfa-facebook"></span> Mạng xã hội</a></li>
                <li class="{kichhoat_ykien}"><a href="{SITE-NAME}/controller/admin/ykien.php"><span class="icon-comment"></span> Ý kiến khách hàng</a></li>
                <li class="{kichhoat_tieuchi}"><a href="{SITE-NAME}/controller/admin/tieuchi.php"><span class="icon-check"></span> Tiêu chí</a></li>
            </ul>
        </div>
        <!--leftmenu-->

    </div>
    <!--mainleft-->
    <!-- END OF LEFT PANEL -->

    <!-- START OF RIGHT PANEL -->
    <div class="rightpanel">
        <div class="headerpanel">
            <a href="#" class="showmenu"></a>

            <div class="headerright">


                <div class="dropdown userinfo">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#"
                       href="#">Xin chào, {USER-NAME} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{SITE-NAME}"><span class=" icon-globe"></span>Tới website</a></li>
                        <li><a href="{SITE-NAME}/controller/admin/signout.php"><span class="icon-share"></span> Đăng xuất</a></li>

                    </ul>
                </div>
                <!--dropdown-->

            </div>
            <!--headerright-->

        </div>
        <!--headerpanel-->
        <div class="breadcrumbwidget">

            <ul class="breadcrumb">
                <li><a href="{SITE-NAME}/admin">Home</a> <span class="divider">/</span></li>

            </ul>
        </div>
        <!--breadcrumbwidget-->
        <div class="pagetitle">
            <h1>Hệ thống quản trị {SITE-NAME}</h1>
        </div>
        <!--pagetitle-->

        <div class="maincontent">