<nav class="navbar navbar-default nav-bg-color w3-card">
    <div class="navbar-header ">
        <a class="navbar-brand" href="#"><img class="mylogo" src="/assets/img/logobanner.png"/></a>
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
    <div class="menu" style="margin-left: 40px;">
        <ul>
            <li><a href="/">หน้าแรก</a></li>
            <li><a href="/profressor"><i class="fa fa-user"> อาจารย์</i></a>
                <ul>
                    <li><a href="/right">สิทธิ์</a></li>
                    <li><a href="/position">ตำแหน่ง</a></li>
                    <li><a href="/qualification">คุณวุฒิ</a></li>
                    <li><a href="/term">ภาคเรียน</a></li>
                    <li><a href="/program">การสอน</a></li>
                </ul>
            </li>
            <li><a href="/study"><i class="fa fa-bar-chart"> วิจัย</i></a>
                <ul>
                    <li><a href="/soure">แหล่งทุน</a></li>
                    <li><a href="/typesoure">ประเภทแหล่งทุน</a></li>
                </ul>
            </li>
                    <li><a href="/portfolio"><i class="glyphicon glyphicon-book"> ผลงานวิชาการ</i></a>
                <ul>
                    <li><a href="/publishs">แหล่งเผยแพร่</a></li>
                    <li><a href="/type">ประเภทผลงาน</a></li>
                    <li><a href="/groups">กลุ่ม</a></li>
                </ul>
            </li>
            <li><a href="/train"><i class="fa fa-clipboard"> อบรม</i></a>
                <ul>
                    <li><a href="/followtrain">การนำไปใช้ประโยชน์</a></li>
                    <li><a href="/sides">ด้าน</a></li>
                </ul>
            </li>
            <li><a href="/education"><i class="glyphicon glyphicon-education"> แผนการศึกษาต่อ</i></a>
                <ul>
                    <li><a href="/follow">ติดตามการศึกษาต่อ</a></li>
                    <li><a href="/degrees">ระดับ</a></li>
                    <li><a href="/branchs">สาขา</a></li>
                    <li><a href="/institutions">สถาบัน</a></li>
                </ul>
            </li>
            <li><a href="/request"><i class="fa fa-address-card"> ขอตำแหน่งฯ</i></a>
                <ul>
                    <li><a href="/subjectss">วิชา</a></li>
                    <li><a href="/positiontypes">ประเภท</a></li>
                    <li><a href="/document">เอกสาร</a></li>
                </ul>
            </li>
            <li>
                {!! Notification::get() !!}
            </li>
        </ul>
    </div>  
</nav>