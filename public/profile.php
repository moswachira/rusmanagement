<style>
.menu ul {
    list-style: none;
  }

.menu ul li{
  background-color: #39609a;
  width: 120px;
  height: 35px;
  text-align: center;
  line-height: 35px;
  float: left;
  position:relative;
  font-size: 13px;
}

.menu ul li a{
  text-decoration: none;
  color: #fff;
  display: block;
  font-size: 13px;

}

.menu ul li a:hover{
  background: #2c4b78;
  border-radius:8px;
}

.menu ul ul {
  margin:0px;
  padding:0px;
  position:absolute;
  display:none;
  z-index: 5;
}

.menu ul li:hover > ul{
  display:block;
}
</style>
<div class="menu">
<ul>
    <li><a href="#">หน้าแรก</a></li>
    <li><a href="#">อาจารย์</a>
      <ul>
        <li><a href="#">ข้อมูลสิทธิ์</a></li>
        <li><a href="#">ข้อมูลตำแหน่ง</a></li>
        <li><a href="#">ข้อมูลคุณวุฒิ</a></li>
        <li><a href="#">ข้อมูลภาคเรียน</a></li>
        <li><a href="#">ข้อมูลการสอน</a></li>
      </ul>
    </li>
    <li><a href="#">วิจัย</a></li>
    <li><a href="#">ผลงานวิชาการ</a></li>
    <li><a href="#">อบรม</a></li>
    <li><a href="#">แผนการศึกษาต่อ</a></li>
    <li><a href="#">ขอตำแหน่งฯ</a></li>
</ul>
</div>