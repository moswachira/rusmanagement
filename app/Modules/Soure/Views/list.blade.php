@extends('custom-layout') 
@section('title','รายการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
        </div>
            @if(CurrentUser::permission([]))
           <a class="btn btn-default" href="/soure/create">เพิ่มแหล่งทุน</a>
           @endif
        <div class="col-md-10" style="padding-top: 70px;">
        <div class="panel panel-info">
                <div class="panel-heading">ค้นหา <button type="submit" class="btn btn-default pull-right" style="padding-top: 2px;padding-bottom: 2px;"><i class="fa fa-search"></button></i></div>
                <div class="panel-body">
                    <form action="/soure">
                        <div class="form-group">
                        <div class="col-md-12">
                        <div class="col-md-6">
                            <label for="keyword">คีย์เวร์ด</label>
                            <input type="text" name="keyword" value="{{Input::get('keyword')}}" class="form-control">
                        </div>
                        <div class="col-md-6">
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
                        </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="panel panel-info">
                <div class="panel-heading">ตารางแหล่งทุน  <a class="btn btn-default pull-right" href="/soure/create" style="padding-top: 2px;padding-bottom: 2px;"><i class="fa fa-plus"></i></a></div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>แหล่งทุน</th>
                                <th>ประเภทแหล่งทุน</th>
                                <th style="width:120px"></th>
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
