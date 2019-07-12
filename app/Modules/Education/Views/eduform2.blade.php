@extends('custom-layout') 
@section('title','เพิ่มราการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">รายชื่อสถาบัน</div>
                <div class="panel-body">
                        <div class="form-group">
                            <label for="">ชื่อสถาบัน</label>
                            <input list="hosting-plan" type="text">
                            <datalist id="hosting-plan">
                                <option value="จุฬาลงกรณ์มหาวิทยาลัย"/>
                                <option value="มหาวิทยาลัยธรรมศาสตร์"/>
                                <option value="มหาวิทยาลัยเกษตรศาสตร์"/>
                                <option value="มหาวิทยาลัยมหิดล"/>
                                <option value="มหาวิทยาลัยศิลปากร"/>
                                <option value="มหาวิทยาลัยเชียงใหม่"/>
                                <option value="มหาวิทยาลัยขอนแก่น"/>
                                <option value="สถาบันบัณฑิตพัฒนบริหารศาสตร์"/>
                                <option value="มหาวิทยาลัยสงขลานครินทร์"/>
                                <option value="มหาวิทยาลัยรามคำแหง"/>
                            </datalist>
                            <label for="">คุณวุฒิระดับ</label>
                            <input list="hosting-plan2" type="text">
                            <datalist id="hosting-plan2">
                                <option value="ปริญญาตรี"/>
                                <option value="ปริญญาโท"/>
                                <option value="ปริญญาเอก"/>
                            </datalist>
                            <label for="">สาขาวิชาของสถาบัน</label>
                            <input list="hosting-plan3" type="text">
                            <datalist id="hosting-plan3">
                                <option value="Building Design"/>
                                <option value="Strength of Material"/>
                                <option value="Automatic Control"/>
                                <option value="Fluid mechanics"/>
                                <option value="Structural Analysis"/>
                            </datalist>
                        </div>
                        <button type="submit" class="btn btn-info" ><a href="/education/finish">ยืนยัน</button></a>
                        <button type="submit" class="btn btn-info">ยกเลิก</button>
                    </form>
                </div>
            </div>   
        </div> 
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">รายละเอียดการศึกษา</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>รหัสอาจารย์</th>
                                <th>ชื่ออาจารย์</th>
                                <th>สถาบัน</th>
                                <th>คุณวุฒิ</th>
                                <th>สาขา</th>
                            </tr>
                        </thead>
                        <tbody>
                                <td>159333241061</td>
                                <td>วงศธร ด้วงนิล</td>
                                <td>มหาวิทยาลัย จุฬาลงกรณ์มหาวิทยาลัย</td>
                                <td>ปริญญาโท</td>
                                <td>Building Design</td>
                            </tr>
                        </tbody>
                    </table>
                                        <button type="button" class="btn btn-sm btn-info">แก้ไข</button>
                                        <button type="button" class="btn btn-sm btn-info">ลบ</button>
                </div>
            </div>
        </div>
 
@endsection