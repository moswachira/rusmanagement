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
            <div class="newbar">
                <a href="/"><i class="fa fa-home"> หน้าแรก</i></a>
                <a href="/profressor"><i class="fa fa-user"> อาจารย์</i></a>
                <a href="/study"><i class="fa fa-bar-chart"> วิจัย</i></a>
                <a href="/portfolio"><i class="glyphicon glyphicon-book"> ผลงานวิชาการ</i></a>
                <a href="#news"><i class="fa fa-clipboard"> อบรม</i></a>
                <a href="#news"><i class="glyphicon glyphicon-education"> แผนการศึกษาต่อ</i></a>
                <a href="/request"><i class="fa fa-address-card"> ขอตำแหน่งทางวิชาการ</i></a>
                <div class="newdropdown">
                    <button class="newdropbtn"><i class='fa fa-file-text'></i> 
                    <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="newdropdown-content">
                    <div class="newheader">
                        <h2>จัดการข้อมูล</h2>
                    </div>   
                    <div class="newrow">
                        <div class="newcolumn">
                        <h4>อาจารย์</h4>
                        <a href="/right">สิทธิ์</a>
                        <a href="/position">ตำแหน่ง</a>
                        <a href="/qualification">คุณวุฒิ</a>
                        <a href="/term">ภาคเรียน</a>
                        <a href="/program">การสอน</a>
                        </div>
                        <div class="newcolumn">
                        <h4>วิจัย</h4>
                        <a href="/soure">แหล่งทุน</a>
                        <a href="/typesoure">ประเภทแหล่งทุน</a>
                        </div>
                        <div class="newcolumn">
                        <h4>ผลงานวิชาการ</h4>
                        <a href="/publishs">แหล่งเผยแพร่</a>
                        <a href="/type">ประเภทผลงาน</a>
                        <a href="/groups">กลุ่ม</a>
                        </div>
                        <div class="newcolumn">
                        <h4>อบรม</h4>
                        <a href="/sides">ด้าน</a>
                        </div>
                        <div class="newcolumn">
                        <h4>แผนการศึกษาต่อ</h4>
                        <a href="/degrees">ระดับ</a>
                        <a href="/branchs">สาขา</a>
                        <a href="/institutions">สถาบัน</a>
                        </div>
                        <div class="newcolumn">
                        <h4>ขอตำแหน่งทางวิชาการ</h4>
                        <a href="/subjectss">วิชา</a>
                        <a href="/positiontypes">ประเภท</a>
                        <a href="/document">เอกสาร</a>
                        </div>
                    </div>
                    </div>
                </div> 
            </div>
        </ul>
    </div>  
</nav>
<!-- <div class="newbar w3-card">
                <a href="#home">หน้าแรก</a>
                <a href="#news">อาจารย์</a>
                <a href="#news">วิจัย</a>
                <a href="#news">ผลงานวิชาการ</a>
                <a href="#news">อบรม</a>
                <a href="#news">แผนการศึกษาต่อ</a>
                <a href="#news">ขอตำแหน่งทางวิชาการ</a>
                <div class="newdropdown">
                    <button class="newdropbtn">จัดการข้อมูล 
                    <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="newdropdown-content">
                    <div class="newheader">
                        <h2>Mega Menu</h2>
                    </div>   
                    <div class="newrow">
                        <div class="newcolumn">
                        <h3>Category 1</h3>
                        <a href="#">Link 1</a>
                        <a href="#">Link 2</a>
                        <a href="#">Link 3</a>
                        </div>
                        <div class="newcolumn">
                        <h3>Category 2</h3>
                        <a href="#">Link 1</a>
                        <a href="#">Link 2</a>
                        <a href="#">Link 3</a>
                        </div>
                        <div class="newcolumn">
                        <h3>Category 3</h3>
                        <a href="#">Link 1</a>
                        <a href="#">Link 2</a>
                        <a href="#">Link 3</a>
                        </div>
                    </div>
                    </div>
                </div> 
            </div> -->