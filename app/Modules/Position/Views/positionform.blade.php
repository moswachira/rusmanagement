@extends('custom-layout')
@section('title')
@section('content' )
<ul class="breadcrumb w3-card">
  <li><a href="/"><i class="fa fa-home"> หน้าแรก</i></a></li>
  <li><a href="/profressor"><i class="fa fa-user"> อาจารย์</i></a></li>
  <li><a href="/position"><i class="fa fa-male"> รายการข้อมูลตำแหน่ง</i></a></li>
    @if(isset($position))
        <li><i class="fa fa-edit"> แก้ไขข้อมูลตำแหน่ง</i></li>
    @else
        <li><i class="fa fa-plus"> เพิ่มรายการข้อมูลตำแหหน่ง</i></li>
    @endif
</ul>
<div class="row">
        <div class="col-md-1">   
        </div>
          <div class="col-md-10">   
            <div class="panel panel-primary w3-card">
                <a herf="/position"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($position))
                    ตำแหน่ง : {{$position->aca_name}}
                    @else
                    เพิ่มตำแหน่ง
                    @endif
                    <a class="btn btn-default pull-right" href="/position/" style="padding-top: 2px;padding-bottom: 2px;" data-toggle="tooltip" title="กลับหน้าขอตำแหน่ง"><i class="fa fa-close"></i></a>
                </div>
                @if(isset($position))
                <form action="/position/{{$position->aca_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf()
                @else
                <form class="form-ajax" action="/position" method="POST">
                @csrf()
                @endif
                    <div class="panel-body">
                        <th>ชื่อ:</th>
                    <input type="text" name="acaname" class="form-control" value="{{isset($position)?$position->aca_name:''}}"/>
                        <th>ย่อ:</th>
                    <input type="text" name="initials" class="form-control" value="{{isset($position)?$position->initials:''}}"/>
                    </div> 
                    <button class="btn">ยืนยัน</button>
                </form>
            </div> 
        <div class="col-md-1">   
        </div>
</div>
@endsection
