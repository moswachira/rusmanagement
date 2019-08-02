@extends('custom-layout') 
@section('title','รายการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">ติดตามการไปศึกษาต่อ</div>
                <div class="panel-body">
                    <form action="/follow" class="form-ajax" method="POST">
                        <input type ="hidden" name ="edu_id" value="{{$edu_id}}"/>
                        <div class="form-group">
                            <label for="status">สถานะ:</label>
                            <select class="form-control" name="status">
                                <option value="กำลังศึกษา">กำลังศึกษา</option>
                                <option value="จบการศึกษา">จบการศึกษา</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="detail">รายละเอียด:</label>
                            <input type="text" class="form-control" name="detail" id="detail">
                        </div>
                        <div class="form-group">
                            <label for="date">วัน/เดือน/ปี:</label>
                            <input type="date" class="form-control" name="date" id="date">
                        </div>
                        <button type="submit">ยืนยัน</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">ตารางอาจารย์</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width:30px">#</th>
                                <th>ชื่อ-นามสกุล</th>
                                <th width="50%">รายละเอียด</th>
                                <th>วันเดือนปี</th>
                                <th>สถานะ</th>
                                <th style="width:160px"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($follow as $index => $fow)                   
                                <td>{{$index+1}}</td>
                                <td>{{$fow->first_name}} {{$fow->last_name}}</td>
                                <td>{{$fow->detail}}</td>
                                <td>{{$fow->date}}</td>
                                <td>{{$fow->status}}</td>
                                <td>
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
