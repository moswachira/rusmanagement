@extends('custom-layout') 
@section('title','เพิ่มราการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-primary w3-card">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <form action="/worktype">
                        <div class="form-group">
                            <label for="keyword">ค้นหา</label>
                            <input type="text" name="keyword" value="{{Input::get('keyword')}}" class="form-control">
                        </div>  
                        <button type="submit" class="btn btn-default">ค้นหาประเภทงาน</button>
                    </form>
                </div>
            </div>
            @if(CurrentUser::permission([3]))
            <button type="submit" class="btn btn-default"><a href="/worktype/create">เพิ่มประเภทงาน</a></button>
            @endif
        </div> 
        <div class="col-md-10">
            <div class="panel panel-primary w3-card">
                <div class="panel-heading">ตารางประเภทงาน</div>
                        <div class="panel-body">
                            <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="50%">#</th>
                                <th>ประเภทงาน</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($worktype as $index => $worktypes)
                            <tr>                       
                                <td>{{$index+1}}</td>
                                <td>{{$worktypes->wokt_name}}</td>     
                                <td>
                                    <div class="btn-group">
                                    @if(CurrentUser::permission([]))
                                    <a class="btn btn-default" href="/worktype/{{$worktypes->wokt_id}}"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-default delete-item" href="/worktype/{{$worktypes->wokt_id}}"><i class="fa fa-trash"></i></a>
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