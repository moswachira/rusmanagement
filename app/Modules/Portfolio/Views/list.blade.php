@extends('custom-layout') 
@section('title','รายการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <form action="/portfolio">
                        <div class="form-group">
                            <label for="keyword">ค้นหา</label>
                            <input type="text" name="keyword" value="{{Input::get('keyword')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>แหล่งเผยแพร่</label>
                            <select style="width:100px" name="pub_id">
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
                            <select name="acatype_id">
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
                            <select name="gro_id">
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
                        <button type="submit" class="btn btn-default">ค้นหาแหล่งเผยแพร่</button>
                    </form>
                </div>
            </div>
           <a class="btn btn-default" href="/portfolio/create">เพิ่มแหล่งเผยแพร่</a>
            
        </div> 
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">ตารางแหล่งเผยแพร่ผลงาน</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>รหัสผลงาน</th>
                                <th>ชื่อ</th>
                                <th>ชื่อผลงาน</th>
                                <th>แหล่งเผยแพร่</th>
                                <th>ประเภท</th>
                                <th>กลุ่ม</th>
                                <th>คะแนน</th>
                                <th style="width:200.px">แก้ไขรายการ</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($portfolio as $index => $port)
                            <tr>                       
                                <td>{{$index+1}}</td>
                                <td>ชื่อ</td>
                                <td>{{$port->por_name}}</td>
                                <th>{{$port->pub_name}}</th>
                                <td>{{$port->acatype_name}}</td>
                                <th>{{$port->gro_name}}</th>
                                <td>{{$port->score}}</td>
                                <td>
                                    <div class="btn-group">
                                    <a class="btn btn-default" href="/portfolio/{{$port->por_id}}"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-default delete-item" href="/portfolio/{{$port->por_id}}"><i class="fa fa-trash"></i></a>
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
