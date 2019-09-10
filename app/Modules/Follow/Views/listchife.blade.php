@extends('custom-layout') 
@section('title','รายการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<ul class="breadcrumb w3-card">
  <li><a href="/"><i class="fa fa-home"> หน้าแรก</i></a></li>
  <li><a href="/education"><i class="glyphicon glyphicon-education">แผนการศึกษาต่อ</i></a></li>
</ul>
<div class="container">
    @if(CurrentUser::permission([3]))
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary w3-card">
                <div class="panel-heading">ตารางติดตามการศึกษาต่อ</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width:30px">#</th>
                                <th>ชื่อ-นามสกุล</th>
                                <th width="25%">รายละเอียดการศึกษาต่อ</th>
                                <th>วันเดือนปี</th>
                                <th>สถานะ</th>
                                <th style="width:160px"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($follow as $index => $followw)                   
                                <td>{{$index+1}}</td>
                                <td>{{$followw->first_name}} {{$followw->last_name}}</td>
                                <td>{{$followw->detail}}</td>
                                <td>{{$followw->date}}</td>
                                <td>{{$followw->status}}</td>
                                <td>
                                <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">
                                <span class="glyphicon glyphicon-commentplan"></span> Commentplan
                                </button>
                                </td>
                                </td>
                            </tr>
                                <form action="/commentplan" class="form-ajax" method="POST">
                                <input type ="hidden" name ="fow_id" value="{{$followw->fow_id}}"/>
                                <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                                <div class="modal-body">
                                                <input type="text" name="comp_name" class="form-control" ></textarea>
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
