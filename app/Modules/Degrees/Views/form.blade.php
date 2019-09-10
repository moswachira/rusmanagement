@extends('custom-layout')
@section('title')
@section('content' )
<ul class="breadcrumb w3-card">
  <li><a href="/"><i class="fa fa-home"> หน้าแรก</i></a></li>
  <li><a href="/education"><i class="glyphicon glyphicon-education">แผนการศึกษาต่อ</i></a></li>
  <li><a href="/degrees"><i class="glyphicon glyphicon-stats"> รายการข้อมูลระดับ</i></a></li>
    @if(isset($rights))
        <li><i class="fa fa-edit"> แก้ไขข้อมูลระดับ</i></li>
    @else
        <li><i class="fa fa-plus"> เพิ่มรายการข้อมูลระดับ</i></li>
    @endif
</ul>
<div class="row">
        <div class="col-md-1">   
        </div>
          <div class="col-md-10">   
            <div class="panel panel-primary w3-card">
                <a herf="/degrees"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($degrees))
                    ระดับ : {{$degrees->degr_name}}
                    @else
                    เพิ่มระดับ
                    @endif
                    <a class="btn btn-default pull-right" href="/degrees/" style="padding-top: 2px;padding-bottom: 2px;" data-toggle="tooltip" title=""><i class="fa fa-close"></i></a>    
                </div>
                @if(isset($degrees))
                <form action="/degrees/{{$degrees->degr_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf()
                @else
                <form class="form-ajax" action="/degrees" method="POST">
                @csrf()
                @endif
                    <div class="panel-body">
                        <th>ระดับ :</th>
                    <input type="text" name="degrname" class="form-control" value="{{isset($degrees)?$degrees->degr_name:''}}"/>
                    </div> 
                    <button class="btn">ยืนยัน</button>
                </form>
            </div> 
        <div class="col-md-1">   
        </div>
</div>
@endsection
