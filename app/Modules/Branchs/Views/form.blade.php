@extends('custom-layout')
@section('title')
@section('content' )
<ul class="breadcrumb w3-card">
  <li><a href="/"><i class="fa fa-home"> หน้าแรก</i></a></li>
  <li><a href="/education"><i class="glyphicon glyphicon-education">แผนการศึกษาต่อ</i></a></li>
  <li><a href="/branchs"><i class="fa fa-child"> รายการข้อมูลสาขา</i></a></li>
    @if(isset($rights))
        <li><i class="fa fa-edit"> แก้ไขข้อมูลสาขา</i></li>
    @else
        <li><i class="fa fa-plus"> เพิ่มรายการข้อมูลสาขา</i></li>
    @endif
</ul>
<div class="row">
        <div class="col-md-1">   
        </div>
          <div class="col-md-10">   
            <div class="panel panel-primary w3-card">
                <a herf="/branchs"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($branchs))
                    สาขา : {{$branchs->bra_name}}
                    @else
                    เพิ่มสาขา
                    @endif
                    <a class="btn btn-default pull-right" href="/branchs/" style="padding-top: 2px;padding-bottom: 2px;" data-toggle="tooltip" title=""><i class="fa fa-close"></i></a>
                </div>
                @if(isset($branchs))
                <form action="/branchs/{{$branchs->bra_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf()
                @else
                <form class="form-ajax" action="/branchs" method="POST">
                @csrf()
                @endif
                    <div class="panel-body">
                        <th>สาขา :</th>
                    <input type="text" name="braname" class="form-control" value="{{isset($branchs)?$branchs->bra_name:''}}"/>
                    </div> 
                    <button class="btn">ยืนยัน</button>
                </form>
            </div> 
        <div class="col-md-1">   
        </div>
</div>
@endsection
