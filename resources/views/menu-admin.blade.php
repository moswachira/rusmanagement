<div id="navbar-wrapper">
        <header>
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    <img class="mylogo" src="http://bait.rmutsb.ac.th/bait/images/logobait.png"/>
                </a>
                </div>  
                    <div id="navbar-collapse" class="collapse navbar-collapse">
                        <form class="navbar-form navbar-left" role="search">
                            <div class="input-group" style="padding-left: 350px;">
                                <input type="text" class="form-control" class="w3-bar-item w3-button" placeholder="Search..">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                </span>
                            </div>
                        </form>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown nav-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                    <i class="fa fa-user" aria-hidden="true"></i> {{CurrentUser::user()->first_name}}<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="sub-nav-menu"><a href="#">รายละเอียด</a></li>
                                    <li class="sub-nav-menu"><a href="/assignment">มอบหมายงาน</a></li>
                                    <li class="sub-nav-menu"><a href="/logout">ออกจากระบบ</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    </div>
    <div class="w3-sidebar w3-bar-block w3-light-grey w3-card "  style="width:15%;padding-top: 50px;">
  <a href="#" class="w3-bar-item w3-button w3-padding-24">หน้าแรก</a> 
  <div class="w3-dropdown-hover">
    <button class="w3-bar-item w3-button w3-padding-24">อาจารย์<i class="fa fa-caret-down" style="padding-left: 10px;"></i></i>
    </button>
    <div class="w3-dropdown-content w3-bar-block">
    <a href="/profressor" class="w3-bar-item w3-button w3-padding-15">รายชื่ออาจารย์</a></li>
    <a href="/right" class="w3-bar-item w3-button w3-padding-15">สิทธ์อาจารย์</a>
    <a href="/position" class="w3-bar-item w3-button w3-padding-15">ตำแหน่ง</a>
    <a href="/worktype" class="w3-bar-item w3-button w3-padding-15">ประเภทงาน</a>
    <a href="/term" class="w3-bar-item w3-button w3-padding-15">ภาคเรียน</a>
    <a href="/program" class="w3-bar-item w3-button w3-padding-15">การสอน</a>
    <a href="/teacherprogram" class="w3-bar-item w3-button w3-padding-15">แผรการสอน</a>
    </div>
  </div>  
  <div class="w3-dropdown-hover">
    <button class="w3-bar-item w3-button w3-padding-24">วิจัย<i class="fa fa-caret-down" style="padding-left: 10px;"></i></i>
    </button>
    <div class="w3-dropdown-content w3-bar-block">
      <a href="/study" class="w3-bar-item w3-button w3-padding-15">รายชื่ออาจารย์การทำวิจัย</a>
      <a href="/soure" class="w3-bar-item w3-button w3-padding-15">แหล่งทุน</a>
      <a href="/typesoure" class="w3-bar-item w3-button w3-padding-15">ประเภทแหล่งทุน</a>
    </div>
  </div> 
  <div class="w3-dropdown-hover">
    <button class="w3-bar-item w3-button w3-padding-24">ผลงานวิชาการ<i class="fa fa-caret-down" style="padding-left: 10px;"></i></i>
    </button>
    <div class="w3-dropdown-content w3-bar-block">
      <a href="/portfolio" class="w3-bar-item w3-button w3-padding-15">ผลงานวิชาการ</a>
      <a href="/publishs" class="w3-bar-item w3-button w3-padding-15">แหล่งเผยแพร่ผลงาน</a>
      <a href="/groups" class="w3-bar-item w3-button w3-padding-15">กลุ่ม</a>
      <a href="/type" class="w3-bar-item w3-button w3-padding-15">ประเภทผลงานวิชาการ</a>
    </div>
  </div> 
  <div class="w3-dropdown-hover">
    <button class="w3-bar-item w3-button w3-padding-24">อบรม<i class="fa fa-caret-down" style="padding-left: 10px;"></i></i>
    </button>
    <div class="w3-dropdown-content w3-bar-block">
      <a href="/train" class="w3-bar-item w3-button w3-padding-15">การอบรม</a>
      <a href="/sides" class="w3-bar-item w3-button w3-padding-15">ด้าน</a>
      <a href="/typesoure" class="w3-bar-item w3-button w3-padding-15">ติดตามการนำไปใช้ประโยชน์</a>
    </div>
  </div> 
  <div class="w3-dropdown-hover">
    <button class="w3-bar-item w3-button w3-padding-24">แผนการศึกษาต่อ<i class="fa fa-caret-down" style="padding-left: 10px;"></i></i>
    </button>
    <div class="w3-dropdown-content w3-bar-block">
      <a href="/education" class="w3-bar-item w3-button w3-padding-15">รายละเอียดการศึกษาต่อ</a>
      <a href="/followchife" class="w3-bar-item w3-button w3-padding-15">ติดตามการศึกษาต่อ</a>
      <a href="/branchs" class="w3-bar-item w3-button w3-padding-15">สาขา</a>
      <a href="/institutions" class="w3-bar-item w3-button w3-padding-15">สถาบัน</a>
      <a href="/degrees" class="w3-bar-item w3-button w3-padding-15">ระดับ</a>
      <a href="/qualification" class="w3-bar-item w3-button w3-padding-15">คุณวุฒิ</a>
    </div>
  </div> 
  <div class="w3-dropdown-hover">
    <button class="w3-bar-item w3-button w3-padding-24">ขอตำแหน่งทางวิชาการ<i class="fa fa-caret-down" style="padding-left: 10px;"></i></i>
    </button>
    <div class="w3-dropdown-content w3-bar-block">
      <a href="/request" class="w3-bar-item w3-button w3-padding-15">ขอตำแหน่งทางวิชาการ</a>
      <a href="/subjectss" class="w3-bar-item w3-button w3-padding-15">วิชา</a>
      <a href="/positiontypes" class="w3-bar-item w3-button w3-padding-15">ประเภท</a>
      <a href="/document" class="w3-bar-item w3-button w3-padding-15">เอกสาร</a>
    </div>
  </div> 
</div>

<div style="margin-left:30%">

<div class="w3-container">

</div>

</div>