<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
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
                    <li><a data-toggle="tab" href="#Interface"><i class="fa fa-bar-chart"></i></i> รับอาจารย์</a>
                    </li>
                    <li><a data-toggle="tab" href="#Charts"><span class="glyphicon glyphicon-book"></i> แผนทดแทนอาจารย์</a>
                    </li>
                    <li><a data-toggle="tab" href="#Tables"><i class="fa fa-clipboard"></i> แต่งตั้งอาจารย์ประจำหลักสูตร</a>
                    </li>
                </ul>
                <div class="tab-content custom-menu-content">
                    <div id="mailbox" class="tab-pane notika-tab-menu-bg animated flipInX">               
                    </div>
                    <div id="Interface" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="animations.html">แบบฟอร์ม</a>
                            </li>
                            <li><a href="google-map.html">แหล่งทุน</a>
                            </li>
                        </ul>
                    </div>
                    <div id="Charts" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="flot-charts.html">แบบฟอร์ม</a>
                            </li>
                            <li><a href="bar-charts.html">แหล่งเผยแพร่</a>
                            </li>
                        </ul>
                    </div>
                    <div id="Tables" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="/Home/train">แบบฟอร์ม</a>
                            </li>
                            <li><a href="/Home/train2">การนำไปใช้ประโยชน์</a>
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
                    <div id="Appviews" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="notification.html">Notifications</a>
                            </li>
                            <li><a href="alert.html">Alerts</a>
                            </li>
                            <li><a href="modals.html">Modals</a>
                            </li>
                            <li><a href="buttons.html">Buttons</a>
                            </li>
                            <li><a href="tabs.html">Tabs</a>
                            </li>
                            <li><a href="accordion.html">Accordion</a>
                            </li>
                            <li><a href="dialog.html">Dialogs</a>
                            </li>
                            <li><a href="popovers.html">Popovers</a>
                            </li>
                            <li><a href="tooltips.html">Tooltips</a>
                            </li>
                            <li><a href="dropdown.html">Dropdowns</a>
                            </li>
                        </ul>
                    </div>
                    <div id="Page" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="contact.html">Contact</a>
                            </li>
                            <li><a href="invoice.html">Invoice</a>
                            </li>
                            <li><a href="typography.html">Typography</a>
                            </li>
                            <li><a href="color.html">Color</a>
                            </li>
                            <li><a href="login-register.html">Login Register</a>
                            </li>
                            <li><a href="404.html">404 Page</a>
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
</html>