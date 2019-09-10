@extends('custom-layout')
@section('title')
@section('content' )
<ul class="breadcrumb w3-card">
  <li><a href="/"><i class="fa fa-home"> หน้าแรก</i></a></li>
  <li><a href="/request"><i class="fa fa-address-card"> ขอกำหนดตำแหน่งทางวิชาการ</i></a></li>
  <li><a href="/positiontypes"><i class="fa fa-clone"> รายการข้อมูลประเภท</i></a></li>
    @if(isset($positiontypes))
        <li><i class="fa fa-edit"> แก้ไขข้อมูลประเภท</i></li>
    @else
        <li><i class="fa fa-plus"> เพิ่มรายการข้อมูลประเภท</i></li>
    @endif
</ul>
<div class="row">
        <div class="col-md-1">   
        </div>
          <div class="col-md-10">   
            <div class="panel panel-primary w3-card">
                <a herf="/positiontypes"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($positiontypes))
                    ประเภท : {{$positiontypes->pos_name}}
                    @else
                    เพิ่มประเภท
                    @endif
                    <a class="btn btn-default pull-right" href="/positiontypes/" style="padding-top: 2px;padding-bottom: 2px;" data-toggle="tooltip" title=""><i class="fa fa-close"></i></a>
                </div>
                @if(isset($positiontypes))
                <form action="/positiontypes/{{$positiontypes->pos_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf()
                @else
                <form class="form-ajax" action="/positiontypes" method="POST">
                @csrf()
                @endif
                    <div class="panel-body">
                        <th>ประเภท :</th>
                    <input type="text" name="posname" class="form-control" value="{{isset($positiontypes)?$positiontypes->pos_name:''}}"/>
                    </div> 
                    <button class="btn">ยืนยัน</button>
                </form>
            </div> 
        <div class="col-md-1">   
        </div>
</div>
@endsection
