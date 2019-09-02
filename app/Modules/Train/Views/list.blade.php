@extends('custom-layout') 
@section('title','รายการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<div class="container">
<div class="col-md-2">
</div>
    <div class="col-md-12">
        <div class="panel panel-primary w3-card">
            <div class="panel-heading">ตารางอบรม  <a class="btn btn-default pull-right" href="/train/create" style="padding-top: 2px;padding-bottom: 2px;" data-toggle="tooltip" title="เพิ่มข้อมูล"><i class="fa fa-plus"></i></a></div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ชื่อ</th>
                                <th width="20%">ชื่อเรื่องอบรม</th>
                                <th>ระยะที่เริ่ม</th>
                                <th>ระยะสิ้นสุด</th>
                                <th>สถานที่</th>
                                <th style="width:200.px"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($training as $index => $train)
                            <tr>                       
                                <td>{{$index+1}}</td>
                                <td>{{$train->first_name}} {{$train->last_name}}</td>
                                <td>
                                    <a href="#" class="" data-toggle="modal" data-target="#exampleModa{{$index}}">{{$train->tra_name}}</a>
                                    <div class="modal fade" id="exampleModa{{$index}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">{{$train->tra_name}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                {{$train->detail}}
                                                 </div>
                                            </div>
                                        </div>
                                    </div>  
                                </td>
                                <td>{{$train->start_time}}</td>
                                <td>{{$train->end_time}}</td>
                                <td>{{$train->place}}</td>
                                <td>
                                    <div class="btn-group">
                                    <a class="btn btn-default" href="/followtrain/{{$train->tra_id}}"><i class="fa fa-file-text-o"></i></a>
                                    @if(CurrentUser::permission([]))
                                    <a class="btn btn-default" href="/train/{{$train->tra_id}}"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-default delete-item" href="/train/{{$train->tra_id}}"><i class="fa fa-trash"></i></a>
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
