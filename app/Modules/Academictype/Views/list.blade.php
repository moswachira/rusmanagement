@extends('custom-layout') 
@section('title','รายการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">ค้นหา</div>
                <div class="panel-body">
                    <form action="/type">
                        <div class="form-group">
                            <label for="keyword"></label>
                            <input type="text" name="keyword" value="{{Input::get('keyword')}}" class="form-control">
                        </div>  
                        <button type="submit" class="btn btn-default">ค้นหา</button>
                    </form>
                </div>
            </div>
           <a class="btn btn-default" href="/type/create">เพิ่มแหล่งเผยแพร่</a>
        </div> 
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">ตารางประเภทแหล่งเผยแพร่</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>รหัสประเภทแหล่งเผยแพร่</th>
                                <th>ชื่อประเภทแหล่งเผยแพร่</th>
                                <th style="width:200px"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($academictype as $index => $type)
                            <tr>                       
                                <td>{{$index+1}}</td>
                                <td>{{$type->acatype_name}}</td>
                                <td>
                                    <div class="btn-group">
                                    <a class="btn btn-default" href="/type/{{$type->acatype_id}}"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-default delete-item" href="/type/{{$type->acatype_id}}"><i class="fa fa-trash"></i></a>
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
