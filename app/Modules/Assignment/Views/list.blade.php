@extends('custom-layout') 
@section('title','รายการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">ตารางสาขา</div>
                    <form action="/assignment">
                    </form>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>รายละเอียดงาน</th>
                                <th>ประเภทงาน</th>
                                <th>วันที่เริ่ม</th>
                                <th>วันที่จบ</th>
                                <th style="width:200.px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($assignments as $index => $assignment)
                                <tr>                       
                                    <td>{{$index+1}}</td>
                                    <td>{{$assignment->ass_name}}</td>
                                    <td>{{$assignment->wokt_name}}</td>
                                    <td>{{$assignment->start_time}}</td>
                                    <td>{{$assignment->end_time}}</td>
                                    <td>
                                        <div class="btn-group">
                                            @if(CurrentUser::permission([]))
                                                <a class="btn btn-default" href="/assignment/{{$assignment->wokt_id}}"><i class="fa fa-edit"></i></a>
                                                <a class="btn btn-default delete-item" href="/assignment/{{$assignment->wokt_id}}"><i class="fa fa-trash"></i></a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if(CurrentUser::permission([3]))
                            <a class="btn btn-default" href="/assignment/create">เพิ่มสาขา</a>
                            <button type="submit" class="btn btn-default">ค้นหาสาขา</button>
                        @endif
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection
