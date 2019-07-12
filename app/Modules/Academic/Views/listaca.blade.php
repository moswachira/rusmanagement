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
                                <th>รหัสผลงานวิชาการ</th>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>ชื่อผลงานที่นำไปสเนอ</th>
                                <th>ประเภท</th>
                                <th>แหล่งเผยแพร่</th>
                                <th>คะแนน</th>
                                <th>สถานะ</th>
                                <th style="width:200.px">แก้ไขรายการ</th>
                            </tr>
                        </thead>
                        <tbody>                       
                                <td>00001</td>
                                <td>ไพทูลย์</td>
                                <td>จันทร์เรือง</td>
                                <td>มหาวิทยาลัยจุฬา</td>
                                <td>ปริญญาเอก</td>
                                <td>Building Design</td>
                                <td>2565</td>
                                <td><input type="checkbox" name="vehicle1" value="Bike"> อนุมัติ<br></td>
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
                        <button type="submit" class="btn btn-default"><a href="/academic/addacademic">เพิ่มอาจารย์</a></button>
                    </ul>
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection