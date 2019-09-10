@extends('custom-layout')
@section('title')
@section('content' )
<ul class="breadcrumb w3-card">
  <li><a href="/"><i class="fa fa-home"> หน้าแรก</i></a></li>
  <li><a href="/profressor"><i class="fa fa-user"> อาจารย์</i></a></li>
  <li><a href="/right"><i class="fa fa-child"> รายการข้อมูลสิทธิ์</i></a></li>
    @if(isset($rights))
        <li><i class="fa fa-edit"> แก้ไขข้อมูลสิทธิ์</i></li>
    @else
        <li><i class="fa fa-plus"> เพิ่มรายการข้อมูลสิทธิ์</i></li>
    @endif
</ul>
<div class="row">
        <div class="col-md-1">   
        </div>
          <div class="col-md-10">   
            <div class="panel panel-primary w3-card">
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($rights))
                    สิทธิ์ : {{$rights->right_name}}
                    @else
                    เพิ่มสิทธิ์
                    @endif
                    <a class="btn btn-default pull-right" href="/right/" style="padding-top: 2px;padding-bottom: 2px;" data-toggle="tooltip" title="กลับหน้าสิทธิ์"><i class="fa fa-close"></i></a>
                </div>
                @if(isset($rights))
                <form action="/right/{{$rights->right_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf()
                @else
                <form class="form-ajax" action="/right" method="POST">
                @csrf()
                @endif
                    <div class="panel-body">
                        <th>ชื่อสิทธิ์:</th>
                    <input type="text" name="rightname" class="form-control" value="{{isset($rights)?$rights->right_name:''}}"/>
                    </div> 
                    <button class="btn">ยืนยัน</button>
                </form>
            </div> 
        <div class="col-md-1">   
        </div>
</div>
@endsection
