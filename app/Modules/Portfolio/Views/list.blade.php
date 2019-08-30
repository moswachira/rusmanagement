@extends('custom-layout') 
@section('title','รายการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">ค้นหา</div>
                <div class="panel-body">
                    <form action="/portfolio">
                        <div class="form-group">
                            <label for="keyword">คีย์เวร์ด</label>
                            <input type="text" name="keyword" value="{{Input::get('keyword')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>แหล่งเผยแพร่</label>
                            <select style="width:100%" name="pub_id">
                                <option value="all">
                                    ทั้งหมด
                                </option>
                            @foreach($publish as $index => $rowww)
                            <option value="{{$rowww->pub_id}}" {{Input::get('pub_id')==$rowww->pub_id?'selected':''}}>
                            {{$rowww->pub_name}}
                            </option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label >ประเภท</label>
                            <select style="width:100%" name="acatype_id">
                                <option value="all">
                                    ทั้งหมด
                                </option>
                            @foreach($academictype as $index => $row)
                            <option value="{{$row->acatype_id}}" {{Input::get('acatype_id')==$row->acatype_id?'selected':''}}>
                            {{$row->acatype_name}}
                            </option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label >กลุ่ม</label>
                            <select style="width:100%" name="gro_id">
                                <option value="all">
                                    ทั้งหมด
                                </option>
                            @foreach($group as $index => $roww)
                            <option value="{{$roww->gro_id}}" {{Input::get('gro_id')==$roww->gro_id?'selected':''}}>
                            {{$roww->gro_name}}
                            </option>
                            @endforeach
                            </select>
                        </div>    
                        <button type="submit" class="btn btn-default" ><i class="fa fa-search"></button></i>
                    </form>
                </div>
            </div>
           <a class="btn btn-default" href="/portfolio/create">เพิ่มผลงานวิชาการ</a>
        </div> 
        <div class="col-md-10" style="padding-top: 100px;">
            <div class="panel panel-default">
                <div class="panel-heading">ตารางผลงานวิชาการ</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ชื่อ</th>
                                <th width="40%">ชื่อผลงาน</th>
                                <th>แหล่งเผยแพร่</th>
                                <th>ประเภท</th>
                                <th>กลุ่ม</th>
                                <th>คะแนน</th>
                                <th style="width:100px"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($portfolio as $index => $port)
                            <tr>                       
                                <td>{{$index+1}}</td>
                                <td>{{$port->first_name}} {{$port->last_name}}</td>
                                <td>
                                    <a href="#" class="" data-toggle="modal" data-target="#exampleModa{{$index}}">{{$port->por_name}}</a>
                                    <div class="modal fade" id="exampleModa{{$index}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">{{$port->por_name}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                {{$port->detail}}
                                                 </div>
                                            </div>
                                        </div>
                                    </div>  
                                </td>
                                <th>{{$port->pub_name}}</th>
                                <td>{{$port->acatype_name}}</td>
                                <th>{{$port->gro_name}}</th>
                                <td>{{$port->score}}</td>
                                <td>
                                    <div class="btn-group">
                                    @if(CurrentUser::permission([0]))
                                    <a class="btn btn-default" href="/portfolio/{{$port->por_id}}"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-default delete-item" href="/portfolio/{{$port->por_id}}"><i class="fa fa-trash"></i></a>
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
