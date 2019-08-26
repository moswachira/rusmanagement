@extends('custom-layout') 
@section('title','รายการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">ตารางขอกำหนดตำแหน่งทางวิชาการ</div>
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
        <a class="btn btn-default" href="/request/create">เพิ่มวางแผน</a>
        @endif
    </div>  
</div>
@endsection
