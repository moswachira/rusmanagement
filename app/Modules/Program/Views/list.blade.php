@extends('custom-layout') 
@section('title','รายการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">ค้นหา</div>
                <div class="panel-body">
                    <form action="/program">
                        <div class="form-group">
                            <label for="keyword">คีย์เวร์ด</label>
                            <input type="text" name="keyword" value="{{Input::get('keyword')}}" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-default">ค้นการสอน</button>
                    </form>
                </div>
            </div>
            @if(CurrentUser::permission([3]))
           <a class="btn btn-default" href="/program/create">เพิ่มการสอน</a>
           @endif
        </div> 
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">ตารางการสอน</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>วิชา</th>
                                <th>ภาคเรียน</th>
                                <th>ปีการศึกษา</th>
                                <th style="width:120px"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($program as $index => $programs)
                            <tr>                       
                                <td>{{$index+1}}</td>
                                <td>{{$programs->sub_name}}</td>
                                <td>{{$programs->termn}}</td>
                                <td>{{$programs->year}}</td>
                                <td>
                                    <div class="btn-group">
                                    @if(CurrentUser::permission([]))
                                    <a class="btn btn-default" href="/program/{{$programs->program_id}}"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-default delete-item" href="/program/{{$programs->program_id}}"><i class="fa fa-trash"></i></a>
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
