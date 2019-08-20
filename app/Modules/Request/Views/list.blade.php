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
                                <th style="width:150px"></th>
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
                                </td>
                            </tr>
                        </tbody>
                    </table>
                <div class="panel-heading">ความคืบหน้า % 
                <div class="btn-group" style="padding-left: 940px;">
                        <a class="btn btn-default" href="/requestlog/{{$requests->req_id}}"><i class="fa fa-file-text-o"></i></a>
                        @if(CurrentUser::permission([]))
                        <a class="btn btn-default" href="/request/{{$requests->req_id}}"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-default delete-item" href="/request/{{$requests->req_id}}"><i class="fa fa-trash"></i></a>
                    @endif
                </div>
                </div> 
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>เอกสาร(%)</th>
                                    <th>งานวิจัย(%)</th>
                                    <th>หนังสือ(%)</th>
                                    <th>ตำรา(%)</th>
                                    <th>ปีที่จะส่ง</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td>{{$requests->percent_doc}}</td>
                            @if($requests->select_study=='Y')
                                <td>{{$requests->percent_study}}</td>  
                            @else
                                <td>ไม่เลือก</td> 
                            @endif
                            @if($requests->select_book=='Y')
                                <td>{{$requests->percent_book}}</td>
                            @else
                                <td>ไม่เลือก</td>
                            @endif
                            @if($requests->select_text=='Y')
                                <td>{{$requests->percent_text}}</td>
                            @else
                                <td>ไม่เลือก</td>  
                            @endif
                                <td>{{$requests->complete_year}}</td>
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
        </div>
        <a class="btn btn-default" href="/request/create">เพิ่มการขอตำแหน่งทางวิชาการ</a>
    </div>  
</div>
@endsection
