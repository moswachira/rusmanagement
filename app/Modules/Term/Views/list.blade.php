@extends('custom-layout') 
@section('title','รายการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">ค้นหา</div>
                <div class="panel-body">
                    <form action="/term">
                        <div class="form-group">
                            <label for="keyword"></label>
                            <input type="text" name="keyword" value="{{Input::get('keyword')}}" class="form-control">
                        </div>  
                        <button type="submit" class="btn btn-default">ค้นหาภาคเรียน</button>
                    </form>
                </div>
            </div>                                    
            @if(CurrentUser::permission([]))
           <a class="btn btn-default" href="/term/create">เพิ่มภาคเรียน</a>
            @endif
        </div> 
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">ตารางภาคเรียน</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>ภาคเรียน</th>
                                <th style="width:200.px"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($term as $index => $terms)
                            <tr>                       
                                <td>{{$index+1}}</td>
                                <td>{{$terms->term_name}}</td>
                                <td>
                                    <div class="btn-group">
                                    @if(CurrentUser::permission([]))
                                    <a class="btn btn-default" href="/term/{{$terms->term_id}}"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-default delete-item" href="/term/{{$terms->term_id}}"><i class="fa fa-trash"></i></a>
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