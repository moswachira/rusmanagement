<nav class="navbar navbar-default nav-bg-color w3-card">
    <div class="navbar-header ">
        <a class="navbar-brand" href="#"><img class="mylogo" src="http://bait.rmutsb.ac.th/bait/images/logobait.png"/></a>
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
            <a href="/train"><i class="fa fa-clipboard"> อบรม</i></a>
            <a href="/education"><i class="glyphicon glyphicon-education"> แผนการศึกษาต่อ</i></a>
            <a href="/request"><i class="fa fa-address-card"> ขอตำแหน่งฯ</i></a>
            <div class="newdropdown">
            <button class="newdropbtn"><i class="fa fa-files-o"></i>
            <i class="fa fa-caret-down"></i>
            </button>                    
            <div class="newdropdown-content">
                <ul>
                    <li><a href="#">อาจารย์</a>
                        <ul>
                            <li><a href="#">สิทธิ์</a></li>
                            <li><a href="#">ตำแหน่ง</a></li>
                            <li><a href="#">คุณวุฒิ</a></li>
                            <li><a href="#">ภาคเรียน</a></li>
                            <li><a href="#">การสอน</a></li>
                        </ul>
                    </li>
                    <li><a href="#">วิจัย</a>
                        <ul>
                            <li><a href="#">แหล่งทุน</a></li>
                            <li><a href="#">ประเภทแหล่งทุน</a></li>
                        </ul>
                    </li>
                    <li><a href="#">ผลงานวิชาการ</a></li>
                    <li><a href="#">อบรม</a></li>
                    <li><a href="#">แผนการศึกษาต่อ</a></li>
                    <li><a href="#">ขอตำแหน่ง</a></li>
                </ul>
            </div>
        </div>
    </div>  
</nav>
