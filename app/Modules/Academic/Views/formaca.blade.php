@extends('custom-layout') 
@section('title','เพิ่มราการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<div class="row">
          <div class="col-md-12">   
            <div class="panel panel-default">
              <div class="panel-heading" style="font-size: 20px;">แบบติดตามผลงานวิชาการ
</div>
                <div class="panel-body">
                <div class="form-group">
                <div class="form-group">
                    <label for="email">ชื่อ - สกุล:</label>
                <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="email">ชื่อผบงานที่นำไปเสนอ:</label>
                <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="email">ประเภท:</label>
                <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="email">แหล่งเผยแพร่:</label>
                <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="email">คะแนน:</label>
                <input type="date" class="form-control" id="">
                </div>
                </div>  
              </div> 
</div>
@endsection