@extends('custom-layout') 
@section('title','เพิ่มราการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<div class="row">
        <div class="col-md-2">   
        </div>
          <div class="col-md-8">   
            <div class="panel panel-default">
              <div class="panel-heading" style="font-size: 20px;">แบบติดตามการนำความรู้และทักษะจากการไปฝึกอบรม ประชุมสัมมนา ดูงาน ไปใช้ประโยชน์สำหรับบุคลากรสายวิชาการ
</div>
                <div class="panel-body">
                <div class="form-group">
                    <label for="email">สรุปสาระการนำไปใช้ประโยชน์:</label>
                <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="email">ชื่อ - สกุล:</label>
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
                    <label for="email">ระหว่างวันที่   เดือน     พ.ศ.     ถึงวันที่     เดือน     พ.ศ.:</label>
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
                </div>  
              </div> 
        <div class="col-md-2">   
        </div>
</div>
@endsection