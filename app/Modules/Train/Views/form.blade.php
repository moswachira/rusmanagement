@extends('custom-layout')
@section('title')
@section('content' )
<ul class="breadcrumb w3-card">
  <li><a href="/"><i class="fa fa-home"> หน้าแรก</i></a></li>
  <li><a href="/train"><i class="fa fa-clipboard"> อบรม</i></a></li>
    @if(isset($train))
        <li><i class="fa fa-edit"> แก้ไขข้อมูลอบรม</i></li>
    @else
        <li><i class="fa fa-plus"> เพิ่มข้อมูลอบรม</i></li>
    @endif
</ul>
<div class="row">
        <div class="col-md-1">   
        </div>
          <div class="col-md-10">   
            <div class="panel panel-primary w3-card">
                <a herf="/train"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($train))
                    อบรม : {{$train->tra_name}}
                    @else
                    เพิ่มอบรม
                    @endif
                    <a class="btn btn-default pull-right" href="/train/" style="padding-top: 2px;padding-bottom: 2px;" data-toggle="tooltip" title=""><i class="fa fa-close"></i></a>
                </div>
                @if(isset($train))
                <form action="/train/{{$train->tra_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf()
                @else
                <form class="form-ajax" action="/train" method="POST">   
                @csrf()
                @endif
                    <div class="panel-body">
                    <div class="form-group">
                        <th>ชื่อเรื่อง:</th>
                    <input type="text" name="traname" class="form-control" value="{{isset($train)?$train->tra_name:''}}"/>
                    </div>
                    <div class="form-group">
                        <th>รายละเอียด:</th>
                    <textarea  row="10" name="detail" class="form-control" >{{isset($train)?$train->detail:''}}</textarea>
                    </div>
                    <div class="form-group">
                        <th>ระยะเวลาเริ่ม:</th>
                    <input type="date" name="starttime" class="form-control" value="{{isset($train)?$train->start_time:''}}"/>
                    </div>
                    <div class="form-group">
                        <th>ระยะเวลาสิ้นสุด:</th>
                    <input type="date" name="endtime" class="form-control" value="{{isset($train)?$train->end_time:''}}"/>
                    </div>
                    <div class="form-group">
                        <th>สถานที่:</th>
                    <input type="text" name="place" class="form-control" value="{{isset($train)?$train->place:''}}"/>
                    </div>
                    <button class="btn">ยืนยัน</button>
                </form>
            </div>
        </div>
        <div class="col-md-1">   
    </div>
</div>
@endsection
