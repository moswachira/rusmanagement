@extends('custom-layout') 
@section('title','เพิ่มราการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">รายชื่อสถาบันปัจจุบัน</div>
                <div class="panel-body">
                        <div class="form-group">
                            <label for="">ชื่อสถาบันปัจจุบัน</label>
                            <input type="text" class="form-control">
                            <label for="">คุณวุฒิระดับ</label>
                            <input type="text" class="form-control">
                            <datalist id="hosting-plan2">
                                <option value="ปริญญาตรี"/>
                                <option value="ปริญญาโท"/>
                                <option value="ปริญญาเอก"/>
                            </datalist>
                        </div>
                    </form>
                </div>
            </div>   
        </div> 
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">รายชื่อสถาบันที่จะไปศึกษาต่อ</div>
                <div class="panel-body">
                        <div class="form-group">
                            <label for="">ชื่อสถาบันปัจจุบัน</label>
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
                        </div>
                    </form>
                </div>
            </div>   
        </div> 
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">วันเดือนปีที่ไปและวันเดือนปีที่สิ้นสุด</div>
                <div class="panel-body">
                <div class="form-group">
                    <label for="email">วันเดือนปีที่ไป:</label>
                    <input type="date" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="email">วันเดือนปีที่สิ้นสุด:</label>
                    <input type="date" class="form-control" id="email">
                </div>
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection