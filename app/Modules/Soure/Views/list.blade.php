@extends('custom-layout') 
@section('title','รายการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<ul class="breadcrumb w3-card">
  <li><a href="/"><i class="fa fa-home"> หน้าแรก</i></a></li>
  <li><a href="/study"><i class="fa fa-bar-chart-o"> วิจัย</i></a></li>
  <li><i class="fa fa-institution"> รายการข้อมูลแหล่งทุน</i></li>
</ul>
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-primary w3-card">
                <div class="panel-heading">ค้นหา</div>
                <div class="panel-body">
                    <form action="/soure">
                        <div class="form-group">
                            <input type="text" name="keyword" value="{{Input::get('keyword')}}" class="form-control">
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
                        <button type="submit" class="btn btn-default " ><i class="fa fa-search"></button></i>
                    </form>
                </div>
            </div>
            @if(CurrentUser::permission([]))
           @endif
        </div> 
        <div class="col-md-10">
            <div class="panel panel-primary w3-card">
                <div class="panel-heading">รายการข้อมูลแหล่งทุน 
                @if(CurrentUser::permission([]))
                <a class="btn btn-default pull-right" href="/soure/create" style="padding-top: 2px;padding-bottom: 2px;" data-toggle="tooltip" title="เพิ่มข้อมูล"><i class="fa fa-plus"></i></a>
                @endif
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="10%">#</th>
                                <th>แหล่งทุน</th>
                                <th>ประเภทแหล่งทุน</th>
                                <th style="width:100px"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($soure as $index => $soures)
                            <tr>                       
                                <td>{{$index+1}}</td>
                                <td>{{$soures->sour_name}}</td>
                                <td>{{$soures->sout_name}}</td>
                                <td>
                                    <div class="btn-group">
                                    @if(CurrentUser::permission([]))
                                    <a class="btn btn-default" href="/soure/{{$soures->sour_id}}"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-default delete-item" href="/soure/{{$soures->sour_id}}"><i class="fa fa-trash"></i></a>
                                    @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $soure->render() !!}
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection
