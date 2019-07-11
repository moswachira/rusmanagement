@extends('custom-layout') 
@section('title','เพิ่มราการอาจารย์ประจำมหาวิทยาลัย')
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
        </div> 
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">ตารางการอบรม</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>รหัสการอบรม</th>
                                <th>ชื่อเองอบรม</th>
                                <th>ระยะเวลา</th>
                                <th>สถานที่</th>
                                <th>ผ่านการอบรม</th>
                                <th style="width:200.px">แก้ไขรายการ</th>
                            </tr>
                        </thead>
                        <tbody>                       
                                <td>0001</td>
                                <td>การออกแบบระบบ</td>
                                <td>2/7/2562-3/7/2562</td>
                                <td>หอศิลป์วัฒนธรรม</td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"> ผ่านแล้ว<br></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default"><a class="fa fa-edit"></button></a>
                                        <button type="button" class="btn btn-default"><a class="fa fa-trash"></button></a>
                                    </div>
                                </td>
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