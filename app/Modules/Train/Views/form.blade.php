@extends('custom-layout')
@section('title')
@section('content' )
<div class="row">
        <div class="col-md-2">   
        </div>
          <div class="col-md-8">   
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
                        <th>ชื่อ:</th>
                    <input type="text" name="firstname" class="form-control" value="{{CurrentUser::user()->first_name}}"/>
                        <th>ชื่อเรื่อง:</th>
                    <input type="text" name="traname" class="form-control" value="{{isset($train)?$train->tra_name:''}}"/>
                        <th>รายละเอียด:</th>
                    <textarea  row="10" name="detail" class="form-control" >{{isset($train)?$train->detail:''}}</textarea>
                        <th>ระยะเวลาเริ่ม:</th>
                    <input type="date" name="starttime" class="form-control" value="{{isset($train)?$train->start_time:''}}"/>
                        <th>ระยะเวลาสิ้นสุด:</th>
                    <input type="date" name="endtime" class="form-control" value="{{isset($train)?$train->end_time:''}}"/>
                        <th>สถานที่:</th>
                    <input type="text" name="place" class="form-control" value="{{isset($train)?$train->place:''}}"/>
                    </div> 
                    <button class="btn">ยืนยัน</button>
                </form>
            </div>
            </div> 
        <div class="col-md-2">   
    </div>
</div>
@endsection
