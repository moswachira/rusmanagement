@extends('custom-layout') 
@section('title','รายการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<ul class="breadcrumb w3-card">
  <li><a href="/"><i class="fa fa-home"> หน้าแรก</i></a></li>
  <li><a href="/request"><i class="fa fa-address-card"> ขอกำหนดตำแหน่งทางวิชาการ</i></a></li>
  <li><i class="fa fa-sticky-note-o"> รายการข้อมูลเอกสาร</i></li>
</ul>
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-primary w3-card">
                <div class="panel-heading">ค้นหา</div>
                <div class="panel-body">
                    <form action="/document">
                        <div class="form-group">
                            <label for="keyword"></label>
                            <input type="text" name="keyword" value="{{Input::get('keyword')}}" class="form-control">
                        </div>  
                        <button type="submit" class="btn btn-default " ><i class="fa fa-search"></button></i>
                    </form>
                </div>
            </div>
            @if(CurrentUser::permission([3]))
            @endif
        </div> 
        <div class="col-md-10">
            <div class="panel panel-primary w3-card">
                <div class="panel-heading">รายการข้อมูลเอกสาร <a class="btn btn-default pull-right" href="/document/create" style="padding-top: 2px;padding-bottom: 2px;" data-toggle="tooltip" title="เพิ่มข้อมูล"><i class="fa fa-plus"></i></a></div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                         <tr>
                                <th width="20%">#</th>
                                <th>เอกสาร</th>
                                <th style="width:100px"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($document as $index => $documents)
                            <tr>                       
                                <td>{{$index+1}}</td>
                                <td>{{$documents->doc_name}}</td>
                                <td>
                                    <div class="btn-group">
                                    @if(CurrentUser::permission([3]))
                                    <a class="btn btn-default" href="/document/{{$documents->doc_id}}"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-default delete-item" href="/document/{{$documents->doc_id}}"><i class="fa fa-trash"></i></a>
                                    @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection
