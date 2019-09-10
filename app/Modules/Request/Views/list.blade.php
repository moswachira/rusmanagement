@extends('custom-layout') 
@section('title','รายการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<ul class="breadcrumb w3-card">
  <li><a href="/"><i class="fa fa-home"> หน้าแรก</i></a></li>
  <li><i class="fa fa-address-card"> ขอกำหนดตำแหน่งทางวิชาการ</i></li>
</ul>
<div class="container">
    <div class="row">
    <div class="col-md-2">
    <div class="panel panel-primary w3-card">
        <div class="panel-heading">ค้นหา</div>
        <div class="panel-body">
            <form action="/position">
                <div class="form-group">
                    <label for="keyword"></label>
                    <input type="text" name="keyword" value="{{Input::get('keyword')}}" class="form-control">
                </div>  
                <button type="submit" class="btn btn-default " ><i class="fa fa-search"></button></i>
            </form>
        </div>
    </div>      
    </div>
        <div class="col-md-10">
            <div class="panel panel-primary w3-card">
                <div class="panel-heading">ตารางขอกำหนดตำแหน่งทางวิชาการ  <a class="btn btn-default pull-right" href="/request/create" style="padding-top: 2px;padding-bottom: 2px;" data-toggle="tooltip" title="เพิ่มข้อมูล"><i class="fa fa-plus"></i></a></div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width:140px">#</th>
                                <th>ชื่อ-นามสกุล</th>
                                <th>ตำแหน่งปัจจุบัน</th>
                                <th>ตำแหน่งที่ขอ</th>
                                <th>ชื่อเอกสาร วิชา</th>
                                <th style="width:100px"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($request as $index => $requests)
                            <tr>                       
                                <td>{{$index+1}}</td>
                                <td>{{$requests->first_name}} {{$requests->last_name}}</td>
                                <td>{{$requests->aca_name}}</td>
                                <td>{{$requests->position}}</td>
                                <td>{{$requests->sub_name}}</td>
                                <td>
                                <div class="btn-group">
                                @if(!CurrentUser::is_admin())
                            <a class="btn btn-default" href="/requestlog/{{$requests->req_id}}"><i class="fa fa-file-text-o"></i></a>
                            <a class="btn btn-default" href="/requestlog/{{$requests->req_id}}/edit"><i class="glyphicon glyphicon-file"></i></a>
                        @else
                            <a class="btn btn-default" href="/request/{{$requests->req_id}}"><i class="fa fa-edit"></i></a>
                            <a class="btn btn-default delete-item" href="/request/{{$requests->req_id}}"><i class="fa fa-trash"></i></a>
                        @endif
                    </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @if(!CurrentUser::is_admin())
        @endif
    </div>  
</div>
@endsection
