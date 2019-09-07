<nav class="navbar navbar-default nav-bg-color w3-card">
<div class="navbar-header ">
                <a class="navbar-brand" href="#">
                    <img class="mylogo" src="http://bait.rmutsb.ac.th/bait/images/logobait.png"/>
                </a>
            </div>
            <div class="w3-sidebar w3-bar-block w3-card w3-animate-right" style="display:none;right:0;" id="rightMenu">
                <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large"> &times;</button>
                <a href="#" class="w3-bar-item w3-button w3-center"><i class ="fa fa-user fa-5x"></i></a>
                <a href="#" class="w3-bar-item w3-button">{{CurrentUser::user()->first_name}} {{CurrentUser::user()->last_name}}</a>
                <a href="#" class="w3-bar-item w3-button">รายละเอียด</a>
                <a href="/logout" class="w3-bar-item w3-button">Logout</a>
            </div>
            <div class="w3-teal">
                <button class="w3-button w3-teal w3-xlarge w3-right" onclick="openRightMenu()">&#9776;</button>
            </div>
            <ul  class="nav navbar-nav pull-right" style="padding-top: 25px; font-size: 11px;">
            <ul class="nav navbar-nav">
                            <li class=""><a href="/"><i class="fa fa-home"></i> หน้าแรก</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user">อาจารย์</i>
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/profressor">รายชื่ออาจารย์</a></li>
                                    <li><a href="/right">สิทธิ์</a></li>
                                    <li><a href="/position">ตำแหน่ง</a></li>
                                    <li><a href="/qualification">คุณวุฒิ</a></li>
                                    <li><a href="/term">ภาคเรียน</a></li>
                                    <li><a href="/program">การสอน</a></li>
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
                                    <li><a href="/publishs">แหล่งเผยแพร่</a></li>
                                    <li><a href="/type">ประเภทผลงาน</a></li>
                                    <li><a href="/groups">กลุ่ม</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-clipboard">อบรม</i>
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/train">การอบรม</a></li>
                                    <li><a href="/sides">ด้าน</a></li>
                                    <li><a href="/followtrain">ติดตามการนำไปใช้ประโยชน์</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-education">แผนการศึกษาต่อ</i>
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/education">รายละเอียดการศึกษาต่อ</a></li>
                                    <li><a href="/degrees">ระดับ</a></li>
                                    <li><a href="/branchs">สาขา</a></li>
                                    <li><a href="/institutions">สถาบัน</a></li>
                                    <li><a href="/follow">ติดตามการศึกษาต่อ</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-address-card">ขอตำแหน่งทางวิชาการ</i>
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/request">ขอตำแหน่งทางวิชาการ</a></li>
                                    <li><a href="/subjectss">วิชา</a></li>
                                    <li><a href="/positiontypes">ประเภท</a></li>
                                    <li><a href="/document">เอกสาร</a></li>
                                </ul>
                            </li>
                        </ul>
                        <li>{!! Notification::get() !!}</li>
                <li><a href="#"></a></li>
            </ul>
        </div>  
    </nav>