@extends('custom-layout') 
@section('title','รายการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">ค้นหา</div>
                <div class="panel-body">
                    <form action="/institutions">
                        <div class="form-group">
                            <label for="keyword"></label>
                            <input type="text" name="keyword" value="{{Input::get('keyword')}}" class="form-control">
                        </div>  
                        <button type="submit" class="btn btn-default">ค้นหาสถาบัน</button>
                    </form>
                </div>
            </div>
            @if(CurrentUser::permission([]))
           <a class="btn btn-default" href="/institutions/create">เพิ่มสถาบัน</a>
            @endif
        </div> 
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">ตารางสถาบัน</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>สถาบัน</th>
                                <th style="width:200.px"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($institution as $index => $institutions)
                            <tr>                       
                                <td>{{$index+1}}</td>
                                <td>{{$institutions->inst_name}}</td>
                                <td>
                                    <div class="btn-group">
                                    @if(CurrentUser::permission([]))
                                    <a class="btn btn-default" href="/institutions/{{$institutions->inst_id}}"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-default delete-item" href="/institutions/{{$institutions->inst_id}}"><i class="fa fa-trash"></i></a>
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
