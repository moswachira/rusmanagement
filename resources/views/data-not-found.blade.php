@extends('custom-layout') 
@section('title','ไม่พบรายการที่ท่านต้องการ')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-danger">
                <div class="panel-heading">ไม่พบรายการที่ท่านต้องการ</div>
                <div class="panel-body">
                <p class="text-center" style="padding:50px">
                    ขออภัยระบบไม่พบข้อมูลที่ท่านต้องการ กรุณาตรวจสอบความถูกต้องด้วยค่ะ
                <br/>
                <a href="{{$back_url}}">กลับ
                </p>
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection
