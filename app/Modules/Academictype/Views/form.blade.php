@extends('custom-layout')
@section('title')
@section('content' )
<ul class="breadcrumb w3-card">
  <li><a href="/"><i class="fa fa-home"> หน้าแรก</i></a></li>
  <li><a href="/portfolio"><i class="glyphicon glyphicon-list-alt">ผลงานวิชาการ</i></a></li>
  <li><a href="/type"><i class="fa fa-clone"> รายการข้อมูลประเภทแหล่งเผยแพร่</i></a></li>
    @if(isset($type))
        <li><i class="fa fa-edit"> แก้ไขข้อมูลประเภทแหล่งเผยแพร่</i></li>
    @else
        <li><i class="fa fa-plus"> เพิ่มรายการข้อมูลประเภทแหล่งเผยแพร่</i></li>
    @endif
</ul>
<div class="row">
        <div class="col-md-1">   
        </div>
          <div class="col-md-10">   
            <div class="panel panel-primary w3-card">
                <a herf="/type"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($type))
                    ประเภทแหล่งเผยแพร่ : {{$type->acatype_name}}
                    @else
                    เพิ่มประเภทแหล่งเผยแพร่
                    @endif
                    <a class="btn btn-default pull-right" href="/type/" style="padding-top: 2px;padding-bottom: 2px;" data-toggle="tooltip" title=""><i class="fa fa-close"></i></a>
                </div>
                @if(isset($type))
                <form action="/type/{{$type->acatype_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf()
                @else
                <form class="form-ajax" action="/type" method="POST">
                @csrf()
                @endif
                    <div class="panel-body">
                        <th>ชื่อประเภทแหล่งเผยแพร่:</th>
                    <input type="text" name="acatypename" class="form-control" value="{{isset($type)?$type->acatype_name:''}}"/>
                    </div> 
                    <button class="btn">ยืนยัน</button>
                </form>
            </div> 
        <div class="col-md-1">   
        </div>
</div>
@endsection
