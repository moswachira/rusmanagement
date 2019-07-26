<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Perspective Page View Navigation: Transforms the page in 3D to reveal a menu" />
		<meta name="keywords" content="3d page, menu, navigation, mobile, perspective, css transform, web development, web design" />
		<meta name="author" content="Codrops" />
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico"/>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/custom.css"> 
</head>
<body>
    <nav class="navbar navbar-default nav-bg-color">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    <img class="mylogo" src="http://bait.rmutsb.ac.th/bait/images/logobait.png"/>
                </a>
            </div>  
            <ul style="margin-top:30px;" class="nav navbar-nav pull-right">
                <li class="dropdown nav-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                        <i class="fa fa-user" aria-hidden="true"></i> {{CurrentUser::user()->first_name}}<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="sub-nav-menu"><a href="#">รายละเอียด</a></li>
                        <li class="sub-nav-menu"><a href="/logout">ออกจากระบบ</a></li>
                    </ul>
                </li>
                <li><a href="#"></a></li>
            </ul>
        </div>  
    </nav>
    <div style="height:15px;clear:both;"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">       
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="/"><i class="fa fa-home"></i> หน้าแรก</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user">อาจารย์</i>
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/profressor">รายชื่ออาจารย์</a></li>
                                    <li><a href="/right">สิทธ์อาจารย์</a></li>
                                    <li><a href="/qualification">คุณวุฒิ</a></li>
                                    <li><a href="/position">ตำแหน่ง</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-bar-chart">วิจัย</i>
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/study">รายชื่ออาจารย์การทำวิจัย</a></li>
                                    <li><a href="/soure">แหล่งทุน</a></li>
                                    <li><a href="/typesoure">ประเภทแหล่งทุน</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-book">ผลงานวิชาการ</i>
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                <li><a href="/portfolio">ผลงานวิชาการ</a></li>
                                    <li><a href="/publishs">แหล่งเผยแพร่ผลงาน</a></li>
                                    <li><a href="/groups">กลุ่ม</a></li>
                                    <li><a href="/type">ประเภท</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-clipboard">อบรม</i>
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/train">การอบรม</a></li>
                                    <li><a href="/reports">รายงานการติดตามการนำไปใช้ประโยชน์</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-education">แผนการศึกษาต่อ</i>
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="form-elements.html">รายละเอียดการศึกษา</a></li>
                                    <li><a href="form-components.html">ติดตามแผนการศึกษาต่อ</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-address-card">ขอตำแหน่งทางวิชาการ</i>
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/train">การอบรม</a></li>
                                    <li><a href="/reports">รายงานการติดตามการนำไปใช้ประโยชน์</a></li>
                                </ul>
                            </li>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @yield('content')
<script src="/assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/myscript.js"></script>
</body>
</html>