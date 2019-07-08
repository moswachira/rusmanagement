<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title') </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Perspective Page View Navigation: Transforms the page in 3D to reveal a menu" />
		<meta name="keywords" content="3d page, menu, navigation, mobile, perspective, css transform, web development, web design" />
		<meta name="author" content="Codrops" />
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico"/>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="/assets/css/notika-custom-icon.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="/assets/css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="/assets/css/style.css">   
</head>
<body>
  <nav class="navbar navbar-default nav-bg-color"> 
  <div class="col-md-12">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    <img class="mylogo" src="http://bait.rmutsb.ac.th/bait/images/logobait.png"/>
                </a>
            </div>
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown nav-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                        <i class="fa fa-user" aria-hidden="true"></i> อ.ไพทูล จัทร์เรือง<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="sub-nav-menu"><a href="#">รายละเอียด</a></li>
                        <li class="sub-nav-menu"><a href="#">ออกจากระบบ</a></li>
                    </ul>
                </li>
                <li><a href="#"></a></li>
            </ul>
        </div>
</div>    
    </nav>
    <div class="col-md-12">       
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                    <li class=""><a href="/"><i class="fa fa-home"></i> หน้าแรก</a>
                    </li>
                    <li><a href="/profressor"><i class="fa fa-group"></i> อาจารย์</a>
                    </li>
                    <li><a data-toggle="tab" href="#formres"><i class="fa fa-bar-chart"></i></i> วิจัย</a>
                    </li>
                    <li><a data-toggle="tab" href="#Charts"><span class="glyphicon glyphicon-book"></i> ผลงานทางวิชาการ</a>
                    </li>
                    <li><a data-toggle="tab" href="#Tables"><i class="fa fa-clipboard"></i> การอบรม</a>
                    </li>
                    <li><a data-toggle="tab" href="#Forms"><span class="glyphicon glyphicon-education"></i> วางแผนศึกษาต่อ</a>
                    </li>
                    <li><a data-toggle="tab" href=""><i class="fa fa-address-card"></i> ขอตำแหน่งทางวิชาการ</a>
                    </li>
                </ul>
                <div class="tab-content custom-menu-content">
                    <div id="mailbox" class="tab-pane notika-tab-menu-bg animated flipInX">               
                    </div>
                    <div id="formres" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="/Home/study">แบบฟอร์ม</a>
                            </li>
                            <li><a href="google-map.html">แหล่งทุน</a>
                            </li>
                        </ul>
                    </div>
                    <div id="Charts" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="/Home/academic">แบบฟอร์ม</a>
                            </li>
                            <li><a href="bar-charts.html">แหล่งเผยแพร่</a>
                            </li>
                        </ul>
                    </div>
                    <div id="Tables" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="/Home/train">แบบฟอร์ม</a>
                            </li>
                            <li><a href="/Home/train2"">การนำไปใช้ประโยชน์</a>
                            </li>
                        </ul>
                    </div>
                    <div id="Forms" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="form-elements.html">รายละเอียดการศึกษา</a>
                            </li>
                            <li><a href="form-components.html">ติดตามแผนการศึกษาต่อ</a>
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
<script src="/assets/js/classie.js"></script>
<script src="/assets/js/menu.js"></script>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="/assets/js/meanmenu/jquery.meanmenu.js"></script>
    <!-- main JS
		============================================ -->
    <script src="/assets/js/main.js"></script>
    <!-- modernizr JS
		============================================ -->
        <script src="/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</body>
@yield('content')
<div class="row">
    <div class="col-md-12">
        <div class="col-md-2">   
        </div>
        <div class="col-md-8">   
            <div class="panel panel-default">
            <div class="panel-heading">
            แบบติดตามการนำความรู้และทักษะจากการไปฝึกอบรม ประชุมสัมมนา ดูงาน ไปใช้ประโยชน์
สำหรับบุคลากรสายวิชาการ

        </div>
            <div class="panel-body">
            <form action="/action_page.php">
  <div class="form-group">
    <label for="email">ชื่อ-นามสกุล:</label>
    <input type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="email">ตำแหน่ง:</label>
    <input type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="email">สังกัด:</label>
    <input type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="email">ไปฝึกอบรม/ ประชุมสัมมนา / ดูงาน  เรื่อง:</label>
    <input type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="email">ระหว่างวันที่:</label>
    <input type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="email">ณ (สถานที่อบรม):</label>
    <input type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="email">จัดโดย:</label>
    <input type="email" class="form-control" id="email">
  </div>
  ภายในระยะเวลา 6 เดือน หลังจากการไปฝึกอบรม/ ประชุมสัมมนา/ ดูงาน ท่านได้นำความรู้และทักษะที่ได้รับจากการพัฒนามาใช้ประโยชน์ในด้านใดบ้างและอย่างไร

  <div class="form-group">
    <label for="pwd">ด้านวิชาการ:</label>
    <input type="password" class="form-control" id="pwd">
  </div>
  <div class="form-group">
    <label for="pwd">ด้านเทคนิคการสอน:</label>
    <input type="password" class="form-control" id="pwd">
  </div>
  <div class="form-group">
    <label for="pwd">ด้านการวัดผลการเรียนการสอน:</label>
    <input type="password" class="form-control" id="pwd">
  </div>
  <div class="form-group">
    <label for="pwd">ด้านอื่น ๆ:</label>
    <input type="password" class="form-control" id="pwd">
  </div>
  <button type="submit" class="btn btn-default">ยืนยัน</button><button type="submit" class="btn btn-default">ยกเลิก</button>
</form>
</div>
<div class="col-md-2">   
</div>
            </div>
        </div>
    </div>
</div>