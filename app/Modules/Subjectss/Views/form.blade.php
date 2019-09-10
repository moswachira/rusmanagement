@extends('custom-layout')
@section('title')
@section('content' )
<ul class="breadcrumb w3-card">
  <li><a href="/"><i class="fa fa-home"> หน้าแรก</i></a></li>
  <li><a href="/request"><i class="fa fa-address-card"> ขอกำหนดตำแหน่งทางวิชาการ</i></a></li>
  <li><a href="/subjectss"><i class="fa fa-book"> รายการข้อมูลวิชา</i></a></li>
    @if(isset($subjectss))
        <li><i class="fa fa-edit"> แก้ไขข้อมูลวิชา</i></li>
    @else
        <li><i class="fa fa-plus"> เพิ่มรายการข้อมูลวิชา</i></li>
    @endif
</ul>
<div class="row">
        <div class="col-md-1">   
        </div>
          <div class="col-md-10">   
            <div class="panel panel-primary w3-card">
                <a herf="/subjectss"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($subjectss))
                    วิชา : {{$subjectss->sub_name}}
                    @else
                    เพิ่มวิชา 
                    @endif
                    <a class="btn btn-default pull-right" href="/subjectss/" style="padding-top: 2px;padding-bottom: 2px;" data-toggle="tooltip" title=""><i class="fa fa-close"></i></a>
                </div>
                @if(isset($subjectss))
                <form action="/subjectss/{{$subjectss->sub_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf()
                @else
                <form class="form-ajax" action="/subjectss" method="POST">
                @csrf()
                @endif
                    <div class="panel-body">
                        <th>รหัสวิชา :</th>
                    <input type="text" name="subcode" class="form-control" value="{{isset($subjectss)?$subjectss->sub_code:''}}"/>
                    </div>
                    <div class="panel-body">
                        <th>วิชา :</th>
                    <input type="text" name="subname" class="form-control" value="{{isset($subjectss)?$subjectss->sub_name:''}}"/>
                    </div> 
                    <button class="btn">ยืนยัน</button>
                </form>
            </div> 
        <div class="col-md-1">   
        </div>
</div>
@endsection
