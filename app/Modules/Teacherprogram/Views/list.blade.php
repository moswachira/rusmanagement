@extends('custom-layout') 
@section('title','เพิ่มราการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <form action="/teacherprogram">
                        <div class="form-group">
                            <label for="keyword">ค้นหา</label>
                            <input type="text" name="keyword" value="{{Input::get('keyword')}}" class="form-control">
                        </div>  
                        <div class="form-group">
                            <label >ระดับ</label>
                            <select style="width:100%" name="term_id">
                                <option value="all">
                                    ทั้งหมด
                                </option>
                            @foreach($term as $index => $terms)
                            <option value="{{$terms->term_id}}" {{Input::get('term_id')==$terms->term_id?'selected':''}}>
                            {{$terms->term_name}}
                            </option>
                            @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default">ค้นหาอาจารย์</button>
                    </form>
                </div>
            </div>
            @if(CurrentUser::permission([]))
            <button type="submit" class="btn btn-default"><a href="/teacherprogram/create">เพิ่มแผนการสอน</a></button>
            @endif
        </div> 
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">ตารางแผนการสอน</div>
                        <div class="panel-body">
                            <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ชื่อ-นามสกุล</th>
                                <th>วิชา</th>
                                <th>ภาคเรียน</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teacherprogram as $index => $teacherprograms)
                            <tr>                       
                                <td>{{$index+1}}</td>
                                <td>{{$teacherprograms->first_name}} {{$teacherprograms->last_name}}</td>
                                <td>{{$teacherprograms->sub_name}}</td>     
                                <td>{{$teacherprograms->term_name}}</td>     
                                <td>
                                    <div class="btn-group">
                                    @if(CurrentUser::permission([]))
                                    <a class="btn btn-default" href="/teacherprogram/{{$teacherprograms->teapro_id}}"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-default delete-item" href="/teacherprogram/{{$teacherprograms->teapro_id}}"><i class="fa fa-trash"></i></a>
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