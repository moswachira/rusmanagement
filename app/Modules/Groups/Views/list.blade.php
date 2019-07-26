@extends('custom-layout') 
@section('title','รายการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">ค้นหา</div>
                <div class="panel-body">
                    <form action="/groups">
                        <div class="form-group">
                            <label for="keyword"></label>
                            <input type="text" name="keyword" value="{{Input::get('keyword')}}" class="form-control">
                        </div>  
                        <button type="submit" class="btn btn-default">ค้นหากลุ่ม</button>
                    </form>
                </div>
            </div>
           <a class="btn btn-default" href="/groups/create">เพิ่มกลุ่ม</a>
            
        </div> 
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">ตารางกลุ่ม</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>รหัสกลุ่ม</th>
                                <th>กลุ่ม</th>
                                <th style="width:200.px">แก้ไขรายการ</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($group as $index => $groups)
                            <tr>                       
                                <td>{{$index+1}}</td>
                                <td>{{$groups->gro_name}}</td>
                                <td>
                                    <div class="btn-group">
                                    <a class="btn btn-default" href="/groups/{{$groups->gro_id}}"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-default delete-item" href="/groups/{{$groups->gro_id}}"><i class="fa fa-trash"></i></a>
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
