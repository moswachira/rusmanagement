@extends('custom-layout') 
@section('title','รายการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <form action="/qualification">
                        <div class="form-group">
                            <label for="keyword">ค้นหา</label>
                            <input type="text" name="keyword" value="{{Input::get('keyword')}}" class="form-control">
                        </div>  
                        <button type="submit" class="btn btn-default">ค้นหาคุณวุฒิ</button>
                    </form>
                </div>
            </div>
           <a class="btn btn-default" href="/qualification/create">เพิ่มคุณวุฒิ</a>
            
        </div> 
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">ตารางคุณวุฒิ</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>รหัสคุณวุฒิ</th>
                                <th>คุณวุฒิ</th>
                                <th style="width:200.px">แก้ไขรายการ</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($degree as $index => $qualification)
                            <tr>                       
                                <td>{{$index+1}}</td>
                                <td>{{$qualification->degr_name}}</td>
                                <td>
                                    <div class="btn-group">
                                    <a class="btn btn-default" href="/qualification/{{$qualification->degr_id}}"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-default delete-item" href="/qualification/{{$qualification->degr_id}}"><i class="fa fa-trash"></i></a>
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
