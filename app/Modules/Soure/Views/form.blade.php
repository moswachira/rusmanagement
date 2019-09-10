@extends('custom-layout')
@section('title')
@section('content' )
<ul class="breadcrumb w3-card">
  <li><a href="/"><i class="fa fa-home"> หน้าแรก</i></a></li>
  <li><a href="/study"><i class="fa fa-bar-chart-o"> วิจัย</i></a></li>
  <li><a href="/soure"><i class="fa fa-institution"> รายการข้อมูลแหล่งทุน</i></a></li>
    @if(isset($soures))
        <li><i class="fa fa-edit"> แก้ไขข้อมูลแหล่งทุน</i></li>
    @else
        <li><i class="fa fa-plus"> เพิ่มรายการข้อมูลแหล่งทุน</i></li>
    @endif
</ul>
<div class="row">
        <div class="col-md-1">   
        </div>
          <div class="col-md-10">   
            <div class="panel panel-primary w3-card">
                <a herf="/soure"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($soures))
                    แหล่งทุน : {{$soures->sour_name}}
                    @else
                    เพิ่มแหล่งทุน
                    @endif
                    <a class="btn btn-default pull-right" href="/soure/" style="padding-top: 2px;padding-bottom: 2px;" data-toggle="tooltip" title=""><i class="fa fa-close"></i></a>
                </div>
                @if(isset($soures))
                <form action="/soure/{{$soures->sour_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf()
                @else
                <form class="form-ajax" action="/soure" method="POST">
                @csrf()
                @endif
                    <div class="panel-body">
                    <div class="form-group">
                        <th>ชื่อแหล่งทุน:</th>
                    <input type="text" name="sourname" class="form-control" value="{{isset($soures)?$soures->sour_name:''}}"/>
                    </div>
                    <div class="form-group">
                        <label >ประเภทแหล่งทุน</label>
                        <select name="sout_id">
                            <option value="all">
                                ทั้งหมด
                            </option>
                        @foreach($souretype as $index => $row)
                            <option value="{{$row->sout_id}}" {{isset($soures)&& $soures->sout_id==$row->sout_id?'selected':''}}>
                                {{$row->sout_name}}
                            </option>
                        @endforeach
                        </select>
                    </div>
                    <button class="btn">ยืนยัน</button>
                </form>
            </div> 
        <div class="col-md-1">   
        </div>
</div>
@endsection
