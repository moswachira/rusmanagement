@extends('custom-layout') 
@section('title','รายการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <form action="/action_page.php">
                        <div class="form-group">
                            <label for="email">ค้นหา</label>
                            <input type="email" class="form-control" id="email">
                        </div>  
                        <button type="submit" class="btn btn-default">ค้นหาอาจารย์</button>
                    </form>
                </div>
            </div>
            <button type="submit" class="btn btn-default"><a href="/product/productfrom">เพิ่มอาจารย์</a></button>
            
        </div> 
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">ตารางอาจารย์</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>รหัสอาจารย์</th>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>เพศ</th>
                                <th>คุณวุฒิ</th>
                                <th>ตำแหน่งทางวิชาการ</th>
                                <th>email</th>
                                <th style="width:200.px">แก้ไขรายการ</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($teacher as $index => $row)
                            <tr>                       
                                <td>{{$index+1}}</td>
                                <td>{{$row->first_name}}</td>
                                <td>{{$row->last_name}}</td>
                                <td>ชาย</td>
                                <td>ปริญญาโท</td>
                                <th>อาจารย์</th>
                                <td>kcxnjf@hotmail.com</td>
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
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection
