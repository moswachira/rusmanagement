@extends('custom-layout') 
@section('title','รายการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<div class="container">
    @if(CurrentUser::permission([3]))
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">ตารางติดตามการนำไปใช้ประโยชน์</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width:30px">#</th>
                                <th>ชื่อ-นามสกุล</th>
                                <th>ด้าน</th>
                                <th width="25%">รายละเอียดการนำไปใช้ประโยชน์</th>
                                <th>ระยะเวลาที่เริ่ม</th>
                                <th>ระยะเวลาสิ้นสุด</th>
                                <th>สถานะ</th>
                                <th style="width:160px"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($followtrain as $index => $followtr)                   
                                <td>{{$index+1}}</td>
                                <td>{{$followtr->first_name}} {{$followtr->last_name}}</td>
                                <td>{{$followtr->side_name}}</td>
                                <td>{{$followtr->detail}}</td>
                                <td>{{$followtr->start_time}}</td>
                                <td>{{$followtr->end_time}}</td>
                                <td>{{$followtr->status}}</td>
                                <td>
                                <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">
                                <span class="glyphicon glyphicon-comment"></span> Comment
                                </button>
                                </td>
                                </td>
                            </tr>
                                <form action="/comment" class="form-ajax" method="POST">
                                <input type ="hidden" name ="followt_id" value="{{$followtr->followt_id}}"/>
                                <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">ด้าน {{$followtr->side_name}}</h4>
                                            </div>
                                                <div class="modal-body">
                                                <input type="text" name="com_name" class="form-control" ></textarea>
                                                </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-default" >ยืนยัน</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </form>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif  
</div>
@endsection
