@extends('custom-layout') 
@section('title','รายการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">ติดตามการนำไปใช้ประโยชน์</div>
                <div class="panel-body">
                    <form action="/followtrain" class="form-ajax" method="POST">
                        <input type ="hidden" name ="tra_id" value="{{$tra_id}}"/>
                        <div class="form-group">
                            <label for="side">ด้าน:</label>
                            <input type="text" class="form-control" name="side" id="side">
                        </div>
                        <div class="form-group">
                            <label for="detail">รายละเอียดการนำไปใช้ประโยชน์:</label>
                            <textarea  row="10" name="detail" class="form-control" >{{isset($followtr)?$followtr->detail:''}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="date">วัน/เดือน/ปี:</label>
                            <input type="date" class="form-control" name="date" id="date">
                        </div>
                        <div class="form-group">
                            <label for="status">สถานะ:</label>
                            <select class="form-control" name="status">
                                <option value="ผ่านการอบรม">ผ่านการอบรม</option>
                                <option value="ไม่ผ่านการอบรม">ไม่ผ่านการอบรม</option>
                            </select>
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
                <div class="panel-heading">ตารางติดตามการนำไปใช้ประโยชน์</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width:30px">#</th>
                                <th>ชื่อ-นามสกุล</th>
                                <th>ด้าน</th>
                                <th width="50%">รายละเอียดการนำไปใช้ประโยชน์</th>
                                <th>วันเดือนปี</th>
                                <th>สถานะ</th>
                                <th style="width:160px"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($followtrain as $index => $followtr)                   
                                <td>{{$index+1}}</td>
                                <td>{{$followtr->first_name}} {{$followtr->last_name}}</td>
                                <td>{{$followtr->side}}</td>
                                <td>{{$followtr->detail}}</td>
                                <td>{{$followtr->date}}</td>
                                <td>{{$followtr->status}}</td>
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
