@extends('custom-layout') 
@section('title','รายการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">ค้นหา</div>
                <div class="panel-body">
                    <form action="/profressor">
                        <div class="form-group">
                            <label for="keyword">คีย์เวร์ด</label>
                            <input type="text" name="keyword" value="{{Input::get('keyword')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label >คุณวุฒิ</label>
                            <select style="width:100%" name="degr_id">
                                <option value="all">
                                    ทั้งหมด
                                </option>
                            @foreach($degree as $index => $row)
                            <option value="{{$row->degr_id}}" {{Input::get('degr_id')==$row->degr_id?'selected':''}}>
                            {{$row->degr_name}}
                            </option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label >ตำแหน่ง</label>
                            <select style="width:100%" name="aca_id">
                                <option value="all">
                                    ทั้งหมด
                                </option>
                            @foreach($academic as $index => $roww)
                            <option value="{{$roww->aca_id}}" {{Input::get('aca_id')==$roww->aca_id?'selected':''}}>
                            {{$roww->aca_name}}
                            </option>
                            @endforeach
                            </select>
                        </div>      
                        <button type="submit" class="btn btn-default">ค้นหาอาจารย์</button>
                    </form>
                </div>
            </div>
           <a class="btn btn-default" href="/profressor/create">เพิ่มอาจารย์</a>
        </div> 
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">ตารางอาจารย์</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width:30px">#</th>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>เพศ</th>
                                <th>คุณวุฒิ</th>
                                <th>ตำแหน่ง</th>
                                <th style="width:120px"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($teacher as $index => $profressor)                   
                                <td>{{$index+1}}</td>
                                <td>{{$profressor->first_name}} {{$profressor->last_name}}</td>
                                <td>{{$profressor->gender}}</td>
                                <td>{{$profressor->degr_name}}</td>
                                <td>{{$profressor->aca_name}}</td>
                                <td>
                                    <div class="btn-group">
                                    <a class="btn btn-default" href="/profressor/{{$profressor->tea_id}}"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-default delete-item" href="/profressor/{{$profressor->tea_id}}"><i class="fa fa-trash"></i></a>
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
