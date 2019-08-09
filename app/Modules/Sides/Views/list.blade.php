@extends('custom-layout') 
@section('title','รายการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">ค้นหา</div>
                <div class="panel-body">
                    <form action="/sides">
                        <div class="form-group">
                            <label for="keyword"></label>
                            <input type="text" name="keyword" value="{{Input::get('keyword')}}" class="form-control">
                        </div>  
                        <button type="submit" class="btn btn-default">ค้นหาด้าน</button>
                    </form>
                </div>
            </div>
            @if(CurrentUser::permission([]))
           <a class="btn btn-default" href="/sides/create">เพิ่มด้าน</a>
            @endif
        </div> 
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">ตารางด้าน</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>รหัสด้าน</th>
                                <th>ด้าน</th>
                                <th style="width:200px">แก้ไขรายการ</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($side as $index => $sides)
                            <tr>                       
                                <td>{{$index+1}}</td>
                                <td>{{$sides->side_name}}</td>
                                <td>
                                    <div class="btn-group">
                                    @if(CurrentUser::permission([]))
                                    <a class="btn btn-default" href="/sides/{{$sides->side_id}}"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-default delete-item" href="/sides/{{$sides->side_id}}"><i class="fa fa-trash"></i></a>
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
