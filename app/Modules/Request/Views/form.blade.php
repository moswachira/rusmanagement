@extends('custom-layout')
@section('title')
@section('content' )
<div class="row">
        <div class="col-md-2">   
        </div>
            <div class="col-md-8">   
                <div class="panel panel-default">
                    <a herf="/request"กลับหน้าหลัก></a>
                    <div class="panel-heading" style="font-size: 20px;">
                        @if(isset($requests))
                        อาจารย์ : {{$profressor->first_name}}
                        @else
                        ข้อมูลทั่วไป
                        @endif
                    </div>
                    @if(isset($requests))
                    <form action="/request/{{$requests->req_id}}" class="form-ajax" method="PUT">
                        <input type="hidden" value="put" name="_methods">
                        @csrf()
                    @else
                    <form class="form-ajax" action="/request" method="POST">
                    @csrf()
                    @endif
                        <div class="panel-body">
                        <div class="col-md-12">
                            <div class="col-md-4">
                            <div class="form-group">
                                <th>ชื่อ-นามสกุล:</th>
                                    <input type="text" name="firstname" class="form-control" value="{{isset($profressor)?$profressor->first_name:''}} {{isset($profressor)?$profressor->last_name:''}}"/>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <th>ตำแหน่ง:</th>
                                    <input type="text" name="acaname" class="form-control" value="{{isset($profressor)?$profressor->aca_name:''}}"/>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <th>ตำแหน่งที่จะขอ:</th>
                                @if(isset($profressor) && $profressor->aca_name=='อาจารย์')
                                    <input type="hidden" name="aca_id" class="form-control" value="3"/>
                                    <input type="text" name="position" class="form-control" value="ผู้ช่วยศาสตราจารย์"/>
                                @elseif(isset($profressor) && $profressor->aca_name=='ผู้ช่วยศาสตราจารย์')
                                    <input type="hidden" name="aca_id" class="form-control" value="2"/>
                                    <input type="text" name="position" class="form-control" value="รองศาสตราจารย์"/>
                                 @elseif(isset($profressor) && $profressor->aca_name=='รองศาสตราจารย์')
                                    <input type="hidden" name="aca_id" class="form-control" value="6"/>
                                    <input type="text" name="position" class="form-control" value="ศาสตราจารย์"/>
                                @else
                                <input type="text" name="position" class="form-control" value="ไม่สามารถขอตำแหน่งได้แล้ว"/>
                                @endif
                            </div>
                            </div>
                    </div>
                </div> 
            </div>   
                <div class="panel panel-default">
                    <div class="panel-heading">ข้อมูลรายละเอียดงาน</div>
                        <div class="panel-body">
                            <div class="col-md-12">
                            <div class="form-group">
                                <th>ระบุชื่อ
                                @if(isset($profressor) && $profressor->aca_name=='อาจารย์')
                                    <input type="hidden" name="doc_id" class="form-control" value="1"/>
                                    เอกสารประกอบการสอน
                                @elseif(isset($profressor) && $profressor->aca_name=='ผู้ช่วยศาสตราจารย์')
                                    <input type="hidden" name="doc_id" class="form-control" value="2"/>
                                    เอกสารคำสอน
                                @endif
                                :</th>
                                <input type="text" name="req_name" class="form-control" value="{{isset($requests)?$requests->req_name:''}}"/>
                            </div>
                            </div>
                            <div class="col-md-12">
                            <div class="form-group">
                            <th>ปีที่คาดว่าจะสำเร็จ:</th>
                                <select style="width:30%" name="complete_year">
                                    <option value="all">
                                        ทั้งหมด
                                    </option>
                                @for($i=date('Y');$i<(date('Y')+10);$i++)
                                    <option value="{{$i+543}}" {{isset($requests) && $requests->complete_year==($i+543)?'selected':''}}>
                                        {{$i+543}}
                                    </option>
                                @endfor
                                </select>
                            </div>
                            <div class="col-md-12">
                            <div class="form-group">
                                <input type="checkbox" name="select_study" value="Y"> วิจัย<br>
                                <input type="checkbox" name="select_book" value="Y"> ตำรา<br>
                                <input type="checkbox" name="select_text" value="Y"> หนังสือ<br><br>
                            </div>
                            <div class="form-group">
                                <th>หมายเหตุ:</th>
                                    <textarea row="10" name="note" class="form-control" value="{{isset($requests)?$requests->note:''}}"></textarea>
                            </div> 
                            </div>
                        </div>
                    <button class="btn">ยืนยัน</button>
                </div> 
            </div> 
        <div class="col-md-2">   
    </div>
</div>
@endsection
