<!--
* Project Name: Admin Dashboard
* Version: 0.01
* By: Nasr Aldin
* E-mail: nasr@nasralin.com
-->
<!DOCTYPE html>
<html lang="ar-sa" dir="rtl">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Admin Dashboard</title>
    <link rel="stylesheet" href="{{asset("cms_styles/css/font-awesome.min.css")}}">
    <link rel="stylesheet" href="{{asset("cms_styles/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("cms_styles/css/bootstrap-theme.min.css")}}">
    <link rel="stylesheet" href="{{asset("cms_styles/css/main.min.css")}}">
    <script src="{{asset("cms_styles/js/modernizr-2.8.3.js")}}"></script>
    <script src="{{asset("cms_styles/js/jquery-3.1.1.min.js")}}"></script>
    @yield("style")
</head>

<body>
    <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="left">
                <!-- Single button -->
                <div class="btn-group navbar-top-links">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="glyphicon glyphicon-user"></i>
                    اسم المستخدم
                    <span class="glyphicon glyphicon-list"></span>
                </button>
                    <ul class="dropdown-menu">
                        <li>
                            <span class="user-profile">
                            <img src="{{asset("cms_styles/imgs/avatar1.jpg")}}" alt="avatar" class="img-responsive">
                        </span>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">الاعدادات</a></li>
                        <li><a href="#">تغير كلمة المرور</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#"><i class="glyphicon glyphicon-log-out"></i> تسجيل الخروج</a></li>
                    </ul>
                </div>
            </div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            </div>
            <div class="navbar-collapse collapse">
                <div class="right">
                    <a href="{{route("Categories.index")}}" class="navbar-brand">مول الياسمين</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container wrapper clearfix">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 clearfix">
                <div class="sidebar clearfix">
                    <aside>
                        <div class="sidebar-search">
                            <div class="input-group">
                                <span class="input-group-btn">
                    <button class="btn btn-success" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
                                <input type="text" class="form-control" placeholder="البحث...">
                            </div>
                            <!-- /input-group -->
                        </div>
                        <div class="list-group clearfix">
                            <span class="list-group-item active">
                          القائمة الرئيسية    
                         </span>
                            <a href="{{route("Categories.index")}}" class="list-group-item">
                                <i class="glyphicon glyphicon-eye-open"></i>
                                الأصناف 
                               {{-- @yield("numberOFCategorise") --}}
                                
                            </a>
                            <a href="{{route("Categories.create")}}" class="list-group-item">
                                <i class="glyphicon glyphicon-plus-sign"></i> 
                                إضافة صنف
                            </a>
                            <a href="{{route("Products.index")}}" class="list-group-item">
                                <i class="glyphicon glyphicon-eye-open"></i> 
                                المنتجات
                                {{-- @yield("numberOFProducts") --}}
                                {{--  <span class="badge">42</span> --}}
                            </a>
                            <a href="{{route("Products.create")}}" class="list-group-item">
                                <i class="glyphicon glyphicon-plus-sign"></i> 
                                إضافة منتج
                                
                            </a>
                        </div>
                        <ul class="list-group lg-single">
                            <li class="list-group-item">
                                <a href="#">
                    English (US)
                </a>
                                <span>.</span>
                                <a class="active">
                    العربية
                </a>
                            </li>
                        </ul>
                        <footer>
                            <p>جميع الحقوق محفوظة - 2017 &copy; </p>
                        </footer>
                    </aside>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 clearfix">
                <ol class="breadcrumb">
                    <li><a href="#">لوحة التحكم</a></li>
                    <li><a href="#">@yield("nav_title")</a></li>
                    <li class="active">@yield("nav_subTitle")</li>
                </ol>
                <div class="jumbotron clearfix">
                    @yield("content")
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset("cms_styles/js/bootstrap.min.js")}}"></script>
    <script src="{{asset("cms_styles/js/app.js")}}"></script>
    @yield("script")
</body>

</html>
<!--
Copyright 2017 Nasr Aldin. All Rights Reserved.
Use of this source code is governed by an MIT-style license that
can be found in the LICENSE file at http://nasraldin.com/license
-->