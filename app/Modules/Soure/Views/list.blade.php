@extends('custom-layout') 
@section('title','รายการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">ค้นหา</div>
                <div class="panel-body">
                    <form action="/soure">
                        <div class="form-group">
                            <label for="keyword">คีย์เวร์ด</label>
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
                        <button type="submit" class="btn btn-default">ค้นแหล่งทุน</button>
                    </form>
                </div>
            </div>
            @if(CurrentUser::permission([]))
           <a class="btn btn-default" href="/soure/create">เพิ่มแหล่งทุน</a>
           @endif
        </div> 
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">ตารางแหล่งทุน</div>
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
