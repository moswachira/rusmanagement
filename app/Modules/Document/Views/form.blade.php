@extends('custom-layout')
@section('title')
@section('content' )
<ul class="breadcrumb w3-card">
  <li><a href="/"><i class="fa fa-home"> หน้าแรก</i></a></li>
  <li><a href="/request"><i class="fa fa-address-card"> ขอกำหนดตำแหน่งทางวิชาการ</i></a></li>
  <li><a href="/document"><i class="fa fa-sticky-note-o"> รายการข้อมูลเอกสาร</i></a></li>
    @if(isset($documents))
        <li><i class="fa fa-edit"> แก้ไขข้อมูลเอกสาร</i></li>
    @else
        <li><i class="fa fa-plus"> เพิ่มรายการข้อมูลเอกสาร</i></li>
    @endif
</ul>
<div class="row">
        <div class="col-md-1">   
        </div>
          <div class="col-md-10">   
            <div class="panel panel-primary w3-card">
                <a herf="/document"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($documents))
                    ระดับ : {{$documents->doc_name}} 
                    @else
                    เพิ่มระดับ
                    @endif
                    <a class="btn btn-default pull-right" href="/document/" style="padding-top: 2px;padding-bottom: 2px;" data-toggle="tooltip" title=""><i class="fa fa-close"></i></a>
                </div>
                @if(isset($documents))
                <form action="/document/{{$documents->doc_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf()
                @else
                <form class="form-ajax" action="/document" method="POST">
                @csrf()
                @endif
                    <div class="panel-body">
                        <th>ระดับ :</th>
                    <input type="text" name="docname" class="form-control" value="{{isset($documents)?$documents->doc_name:''}}"/>
                    </div> 
                    <button class="btn">ยืนยัน</button>
                </form>
            </div> 
        <div class="col-md-1">   
        </div>
</div>
@endsection
