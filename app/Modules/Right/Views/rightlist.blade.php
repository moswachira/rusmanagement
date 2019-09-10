@extends('custom-layout') 
@section('title','เพิ่มราการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<ul class="breadcrumb w3-card">
  <li><a href="/"><i class="fa fa-home"> หน้าแรก</i></a></li>
  <li><a href="/profressor"><i class="fa fa-user"> อาจารย์</i></a></li>
  <li><i class="fa fa-child"> รายการข้อมูลสิทธิ์</i></li>
</ul>
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-primary w3-card">
            <div class="panel-heading blue3 w3-card">ค้นหา </div>
                <div class="panel-body">
                    <form action="/right">
                        <div class="form-group">
                            <input type="text" name="keyword" value="{{Input::get('keyword')}}" class="form-control">
                        </div>  
                        <button type="submit" class="btn btn-default " ><i class="fa fa-search"></button></i>
                    </form>
                </div>
            </div>
            @if(CurrentUser::permission([]))
            @endif
        </div> 
        <div class="col-md-10">
            <div class="panel panel-primary w3-card">
                <div class="panel-heading">รายการข้อมูลสิทธ์ <a class="btn btn-default pull-right" href="/right/create" style="padding-top: 2px;padding-bottom: 2px;" data-toggle="tooltip" title="เพิ่มข้อมูล"><i class="fa fa-plus"></i></a></div>
                        <div class="panel-body">
                            <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="20%">#</th>
                                <th>ชื่อสิทธ์</th>
                                <th style="width:100px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($right as $index => $rights)
                            <tr>                       
                                <td>{{$index+1}}</td>
                                <td>{{$rights->right_name}}</td>     
                                <td>
                                    <div class="btn-group">
                                    @if(CurrentUser::permission([]))
                                    <a class="btn btn-default" href="/right/{{$rights->right_id}}"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-default delete-item" href="/right/{{$rights->right_id}}"><i class="fa fa-trash"></i></a>
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