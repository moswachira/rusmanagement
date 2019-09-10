@extends('custom-layout')
@section('title')
@section('content' )
<ul class="breadcrumb w3-card">
  <li><a href="/"><i class="fa fa-home"> หน้าแรก</i></a></li>
  <li><a href="/train"><i class="fa fa-clipboard"> อบรม</i></a></li>
  <li><a href="/sides"><i class="fa fa-list-alt"> รายการข้อมูลด้าน</i></a></li>
    @if(isset($sides))
        <li><i class="fa fa-edit"> แก้ไขข้อมูลสิทธิ์</i></li>
    @else
        <li><i class="fa fa-plus"> เพิ่มรายการข้อมูลด้าน</i></li>
    @endif
</ul>
<div class="row">
        <div class="col-md-1">   
        </div>
          <div class="col-md-10">   
            <div class="panel panel-primary w3-card">
                <a herf="/sides"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($sides))
                    ด้าน : {{$sides->side_name}}
                    @else
                    เพิ่มด้าน
                    @endif
                    <a class="btn btn-default pull-right" href="/sides/" style="padding-top: 2px;padding-bottom: 2px;" data-toggle="tooltip" title=""><i class="fa fa-close"></i></a>
                </div>
                @if(isset($sides))
                <form action="/sides/{{$sides->side_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf()
                @else
                <form class="form-ajax" action="/sides" method="POST">
                @csrf()
                @endif
                    <div class="panel-body">
                        <th>ด้าน :</th>
                    <input type="text" name="sidename" class="form-control" value="{{isset($sides)?$sides->side_name:''}}"/>
                    </div> 
                    <button class="btn">ยืนยัน</button>
                </form>
            </div> 
        <div class="col-md-1">   
        </div>
</div>
@endsection
