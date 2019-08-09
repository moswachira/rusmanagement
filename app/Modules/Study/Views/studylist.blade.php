@extends('custom-layout') 
@section('title','รายการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">ค้นหา</div>
                <div class="panel-body">
                    <form action="/study">
                        <div class="form-group">
                            <label for="keyword">คีย์เวร์ด</label>
                            <input type="text" name="keyword" value="{{Input::get('keyword')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label >แหล่งทุน</label>
                            <select style="width:100%" name="sour_id">
                                <option value="all">
                                    ทั้งหมด
                                </option>
                            @foreach($soure as $index => $row)
                            <option value="{{$row->sour_id}}" {{Input::get('sour_id')==$row->sour_id?'selected':''}}>
                            {{$row->sour_name}}
                            </option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label >ประเภทแหล่งทุน</label>
                            <select style="width:100%" name="sout_id">
                                <option value="all">
                                    ทั้งหมด
                                </option>
                            @foreach($souretype as $index => $roww)
                            <option value="{{$roww->sout_id}}" {{Input::get('sout_id')==$roww->sout_id?'selected':''}}>
                            {{$roww->sout_name}}
                            </option>
                            @endforeach
                            </select>
                        </div>      
                        <button type="submit" class="btn btn-default" ><i class="fa fa-search"></button></i>
                    </form>
                </div>
            </div>
           <a class="btn btn-default" href="/study/create">เพิ่มงานวิจัย</a>
        </div> 
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">ตารางวิจัย</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th width="15%">ชื่อ</th>
                                <th width="30%">ชื่อโปรเจค</th>
                                <th width="10%">ปี</th>
                                <th>แหล่งทุน</th>
                                <th>ประเภทแหล่งทุน</th>
                                <th style="width:95px"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($research as $index => $studys)
                            <tr>                       
                                <td>{{$index+1}}</td>
                                <td>{{$studys->first_name}} {{$studys->last_name}}</td>
                                <td>
                                    <a href="#" class="" data-toggle="modal" data-target="#exampleModa{{$index}}">{{$studys->subject}}</a>
                                    <div class="modal fade" id="exampleModa{{$index}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">{{$studys->subject}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                {{$studys->detail}}
                                                 </div>
                                            </div>
                                        </div>
                                    </div>  
                                </td>
                                <td>{{$studys->year}}</td>
                                <td>{{$studys->sour_name}}</td>
                                <td>{{$studys->sout_name}}</td>
                                <td>
                                    <div class="btn-group">
                                    @if(CurrentUser::permission([0]))
                                    <a class="btn btn-default" href="/study/{{$studys->res_id}}"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-default delete-item" href="/study/{{$studys->res_id}}"><i class="fa fa-trash"></i></a>
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
