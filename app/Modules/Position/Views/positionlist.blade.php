@extends('custom-layout') 
@section('title','รายการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">ค้นหา</div>
                <div class="panel-body">
                    <form action="/position">
                        <div class="form-group">
                            <label for="keyword"></label>
                            <input type="text" name="keyword" value="{{Input::get('keyword')}}" class="form-control">
                        </div>  
                        <button type="submit" class="btn btn-default">ค้นหาตำแหน่ง</button>
                    </form>
                </div>
            </div>                                    
            @if(CurrentUser::permission([]))
           <a class="btn btn-default" href="/position/create">เพิ่มตำแหน่ง</a>
            @endif
        </div> 
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">ตารางตำแหล่ง</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>ชื่อตำแหน่ง</th>
                                <th>ชื่อย่อ</th>
                                <th style="width:200.px"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($academic as $index => $position)
                            <tr>                       
                                <td>{{$index+1}}</td>
                                <td>{{$position->aca_name}}</td>
                                <td>{{$position->initials}}</td>
                                <td>
                                    <div class="btn-group">
                                    @if(CurrentUser::permission([]))
                                    <a class="btn btn-default" href="/position/{{$position->aca_id}}"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-default delete-item" href="/position/{{$position->aca_id}}"><i class="fa fa-trash"></i></a>
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
