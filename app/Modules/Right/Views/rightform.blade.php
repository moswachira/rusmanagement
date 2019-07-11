@extends('custom-layout') 
@section('title','เพิ่มราการอาจารย์ประจำมหาวิทยาลัย')
@section('content')

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">แผนการศึกษาต่อ
                    <div class="pull-right">
                    <input  type="search" placeholder="Search.."><button type="submit"><i class="fa fa-search"></i></div>
                    </div>
                        <div class="panel-body">
                            <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>รหัสสิทธ์</th>
                                <th>ชื่อสิทธ์</th>
                                <th style="width:200.px">แก้ไขรายการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($right as $index => $row)
                            <tr>                       
                                <td>{{$index+1}}</td>
                                <td>{{$row->right_name}}</td>     
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default"><a class="fa fa-edit"></button></a>
                                        <button type="button" class="btn btn-default"><a class="fa fa-trash"></button></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <ul class="pagination">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection