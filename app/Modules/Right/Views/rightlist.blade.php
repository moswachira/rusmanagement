@extends('custom-layout') 
@section('title','เพิ่มราการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <form action="/right">
                        <div class="form-group">
                            <label for="keyword">ค้นหา</label>
                            <input type="text" name="keyword" value="{{Input::get('keyword')}}" class="form-control">
                        </div>  
                        <button type="submit" class="btn btn-default">ค้นหาอาจารย์</button>
                    </form>
                </div>
            </div>
            <button type="submit" class="btn btn-default"><a href="/right/create">เพิ่มสิทธิ์</a></button>
        </div> 
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">ตารางสิทธ์</div>
                        <div class="panel-body">
                            <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>รหัสสิทธ์</th>
                                <th>ชื่อสิทธ์</th>
                                <th style="width:200.px">แก้ไขรายการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($right as $index => $rights)
                            <tr>                       
                                <td>{{$index+1}}</td>
                                <td>{{$rights->right_name}}</td>     
                                <td>
                                    <div class="btn-group">
                                    <a class="btn btn-default" href="/right/{{$rights->right_id}}"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-default delete-item" href="/right/{{$rights->right_id}}"><i class="fa fa-trash"></i></a>
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