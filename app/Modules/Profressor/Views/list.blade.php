@extends('custom-layout') 
@section('title','รายการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<ul class="breadcrumb w3-card">
  <li><a href="/"><i class="fa fa-home"> หน้าแรก</i></a></li>
  <li><i class="fa fa-user"> อาจารย์</i></li>
</ul>
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-primary w3-card">
                <div class="panel-heading">ค้นหา</div>
                <div class="panel-body">
                    <form action="/profressor">
                        <div class="form-group">
                            <input type="text" name="keyword" value="{{Input::get('keyword')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label >ระดับ</label>
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
                            <label >คุณวุฒิ</label>
                            <select style="width:100%" name="qua_id">
                                <option value="all">
                                    ทั้งหมด
                                </option>
                            @foreach($qualification as $index => $row)
                            <option value="{{$row->qua_id}}" {{Input::get('qua_id')==$row->qua_id?'selected':''}}>
                            {{$row->qua_name}}
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
                        <div class="form-group">
                        <label >สาขา</label>
                        <select style="width:100%" name="bra_id">
                            <option value="all">
                                ทั้งหมด
                            </option>
                        @foreach($branch as $index => $roww)
                            <option value="{{$roww->bra_id}}" {{Input::get('bra_id')==$roww->bra_id?'selected':''}}>
                                {{$roww->bra_name}}
                            </option>
                        @endforeach
                        </select>
                    </div>      
                    <button type="submit" class="btn btn-default " ><i class="fa fa-search"></button></i>
                    </form>
                </div>
            </div>
            @if(CurrentUser::permission([3]))
           @endif
        </div> 
        <div class="col-md-10">
            <div class="panel panel-primary w3-card">
                <div class="panel-heading">ตารางอาจารย์ <a class="btn btn-default pull-right" href="/profressor/create" style="padding-top: 2px;padding-bottom: 2px;" data-toggle="tooltip" title="เพิ่มข้อมูล"><i class="fa fa-plus"></i></a></div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width:30px">#</th>
                                <th>ชื่อ</th>
                                <th>เพศ</th>
                                <th>ระดับ</th>
                                <th>คุณวุฒิ</th>
                                <th>สาขา</th>
                                <th>ตำแหน่ง</th>
                                <th style="width:100px"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($teacher as $index => $profressor)                   
                                <td>{{$index+1}}</td>
                                <td>{{$profressor->first_name}} {{$profressor->last_name}}</td>
                                <td>{{$profressor->gender}}</td>
                                <td>{{$profressor->degr_name}}</td>
                                <td>{{$profressor->qua_name}}</td>
                                <td>{{$profressor->bra_name}}</td>
                                <td>{{$profressor->aca_name}}</td>
                                <td>
                                    @if(CurrentUser::permission([]))
                                    <div class="btn-group">
                                    <a class="btn btn-default" href="/profressor/{{$profressor->tea_id}}"><i class="fa fa-edit"></i></a>
                                    @endif
                                    @if(CurrentUser::permission([]))
                                    <a class="btn btn-default delete-item" href="/profressor/{{$profressor->tea_id}}"><i class="fa fa-trash"></i></a>
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
