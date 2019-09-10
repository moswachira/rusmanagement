@extends('custom-layout')
@section('title')
@section('content' )
<ul class="breadcrumb w3-card">
  <li><a href="/"><i class="fa fa-home"> หน้าแรก</i></a></li>
  <li><a href="/education"><i class="glyphicon glyphicon-education">แผนการศึกษาต่อ</i></a></li>
  <li><a href="/institutions"><i class="fa fa-university"> รายการข้อมูลสถาบัน</i></a></li>
    @if(isset($institutions))
        <li><i class="fa fa-edit"> แก้ไขข้อมูลสถาบัน</i></li>
    @else
        <li><i class="fa fa-plus"> เพิ่มรายการข้อมูลสถาบัน</i></li>
    @endif
</ul>
<div class="row">
        <div class="col-md-1">   
        </div>
          <div class="col-md-10">   
            <div class="panel panel-primary w3-card">
                <a herf="/institutions"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($institutions))
                    สถาบัน : {{$institutions->inst_name}}
                    @else
                    เพิ่มสถาบัน 
                    @endif
                    <a class="btn btn-default pull-right" href="/institutions/" style="padding-top: 2px;padding-bottom: 2px;" data-toggle="tooltip" title=""><i class="fa fa-close"></i></a>
                </div>
                @if(isset($institutions))
                <form action="/institutions/{{$institutions->inst_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf()
                @else
                <form class="form-ajax" action="/institutions" method="POST">
                @csrf()
                @endif
                    <div class="panel-body">
                        <th>สถาบัน :</th>
                    <input type="text" name="instname" class="form-control" value="{{isset($institutions)?$institutions->inst_name:''}}"/>
                    </div> 
                    <button class="btn">ยืนยัน</button>
                </form>
            </div> 
        <div class="col-md-1">   
        </div>
</div>
@endsection
