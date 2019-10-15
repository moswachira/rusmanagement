@extends('custom-layout') 
@section('title','รายการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<ul class="breadcrumb w3-card">
  <li><a href="/"><i class="fa fa-home"> หน้าแรก</i></a></li>
  <li><a href="/profressor"><i class="fa fa-user"> อาจารย์</i></a></li>
  <li><i class="fa fa-pencil"> รายการข้อมูลการสอน</i></li>
</ul>
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-primary w3-card">
                <div class="panel-heading">ค้นหา</div>
                <div class="panel-body">
                    <form action="/program">
                        <div class="form-group">
                            <input type="text" name="keyword" value="{{Input::get('keyword')}}" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-default" data-toggle="tooltip" title="ค้นหาข้อมูล"><i class="fa fa-search"></button></i>
                    </form>
                </div>
            </div>
            @if(CurrentUser::permission([3]))
           @endif
        </div> 
        <div class="col-md-10">
            <div class="panel panel-primary w3-card">
                <div class="panel-heading">รายการข้อมูลการสอน  
                @if(CurrentUser::permission([]))
                <a class="btn btn-default pull-right" href="/program/create" style="padding-top: 2px;padding-bottom: 2px;" data-toggle="tooltip" title="เพิ่มข้อมูล"><i class="fa fa-plus"></i></a>
                @endif
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="10%">#</th>
                                <th>วิชา</th>
                                <th>ภาคเรียน</th>
                                <th>ปีการศึกษา</th>
                                <th style="width:100px"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($program as $index => $programs)
                            <tr>                       
                                <td>{{$index+1}}</td>
                                <td>{{$programs->sub_name}}</td>
                                <td>{{$programs->termn}}</td>
                                <td>{{$programs->year}}</td>
                                <td>
                                    <div class="btn-group">
                                    @if(CurrentUser::permission([]))
                                    <a class="btn btn-default" href="/program/{{$programs->program_id}}"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-default delete-item" href="/program/{{$programs->program_id}}"><i class="fa fa-trash"></i></a>
                                    @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $program->render() !!}
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection
