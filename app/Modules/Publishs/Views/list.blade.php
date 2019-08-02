@extends('custom-layout') 
@section('title','รายการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">ค้นหา</div>
                <div class="panel-body">
                    <form action="/publishs">
                        <div class="form-group">
                            <label for="keyword"></label>
                            <input type="text" name="keyword" value="{{Input::get('keyword')}}" class="form-control">
                        </div>  
                        <button type="submit" class="btn btn-default">ค้นหาแหล่งเผยแพร่</button>
                    </form>
                </div>
            </div>
           <a class="btn btn-default" href="/publishs/create">เพิ่มแหล่งเผยแพร่</a>
            
        </div> 
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">ตารางแหล่งเผยแพร่</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>รหัสแหล่งเผยแพร่</th>
                                <th>ชื่อแหล่งเผยแพร่</th>
                                <th>วันเดือนปี</th>
                                <th>สถานที่</th>
                                <th style="width:200.px"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($publish as $index => $publishs)
                            <tr>                       
                                <td>{{$index+1}}</td>
                                <td>{{$publishs->pub_name}}</td>
                                <td>{{$publishs->date}}</td>
                                <td>{{$publishs->place}}</td>
                                <td>
                                    <div class="btn-group">
                                    <a class="btn btn-default" href="/publishs/{{$publishs->pub_id}}"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-default delete-item" href="/publishs/{{$publishs->pub_id}}"><i class="fa fa-trash"></i></a>
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
