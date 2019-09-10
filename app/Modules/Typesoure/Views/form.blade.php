@extends('custom-layout')
@section('title')
@section('content' )
<ul class="breadcrumb w3-card">
  <li><a href="/"><i class="fa fa-home"> หน้าแรก</i></a></li>
  <li><a href="/study"><i class="fa fa-bar-chart-o"> วิจัย</i></a></li>
  <li><a href="/typesoure"><i class="fa fa-clone"> รายการข้อมูลประเภทแหล่งทุน</i></a></li>
    @if(isset($typesoures))
        <li><i class="fa fa-edit"> แก้ไขข้อมูลประเภทแหล่งทุน</i></li>
    @else
        <li><i class="fa fa-plus"> เพิ่มรายการข้อมูลประเภทแหล่งทุน</i></li>
    @endif
</ul>
<div class="row">
        <div class="col-md-1">   
        </div>
          <div class="col-md-10">   
            <div class="panel panel-primary w3-card">
                <a herf="/typesoure"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($souretypes))
                    ประเภทแหล่งทุน : {{$souretypes->sout_name}}
                    @else
                    เพิ่มประเภท
                    @endif
                    <a class="btn btn-default pull-right" href="/typesoure/" style="padding-top: 2px;padding-bottom: 2px;" data-toggle="tooltip" title=""><i class="fa fa-close"></i></a>
                </div>
                @if(isset($souretypes))
                <form action="/typesoure/{{$souretypes->sout_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf()
                @else
                <form class="form-ajax" action="/typesoure" method="POST">
                @csrf()
                @endif
                    <div class="panel-body">
                        <th>ประเภทแหล่งทุน:</th>
                    <input type="text" name="soutname" class="form-control" value="{{isset($souretypes)?$souretypes->sout_name:''}}"/>
                    </div> 
                    <button class="btn">ยืนยัน</button>
                </form>
            </div> 
        <div class="col-md-1">   
        </div>
</div>
@endsection
