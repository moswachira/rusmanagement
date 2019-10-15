@extends('custom-layout')
@section('title')
@section('content' )
<ul class="breadcrumb w3-card">
  <li><a href="/"><i class="fa fa-home"> หน้าแรก</i></a></li>
  <li><a href="/education"><i class="glyphicon glyphicon-education">แผนการศึกษาต่อ</i></a></li>
    @if(isset($edus))
        <li><i class="fa fa-edit"> แก้ไขข้อมูลแผนการศึกษาต่อ</i></li>
    @else
        <li><i class="fa fa-plus"> เพิ่มข้อมูลแผนการศึกษาต่อ</i></li>
    @endif
</ul>
<div class="row">
        <div class="col-md-1">   
        </div>
            <div class="col-md-10">   
                <div class="panel panel-primary w3-card">
                    <a herf="/education"กลับหน้าหลัก></a>
                    <div class="panel-heading" style="font-size: 20px;">
                        @if(isset($edus))
                        อาจารย์ : {{$profressor->first_name}}
                        @else
                        ข้อมูลทั่วไป
                        @endif
                        <a class="btn btn-default pull-right" href="/education/" style="padding-top: 2px;padding-bottom: 2px;" data-toggle="tooltip" title=""><i class="fa fa-close"></i></a>
                    </div>
                    @if(isset($edus))
                    <form action="/education/{{$edus->edu_id}}" class="form-ajax" method="PUT">
                        <input type="hidden" value="put" name="_methods">
                        @csrf()
                    @else
                    <form class="form-ajax" action="/education" method="POST">
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
                                <th>คุณวุฒิ:</th>
                                    <input type="text" name="quaname" class="form-control" value="{{isset($profressor)?$profressor->qua_name:''}}"/>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <th>ระดับ:</th>
                                    <input type="text" name="degrname" class="form-control" value="{{isset($profressor)?$profressor->degr_name:''}}"/>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <th>สาขา:</th>
                                    <input type="text" name="braname" class="form-control" value="{{isset($profressor)?$profressor->bra_name:''}}"/>
                            </div>
                            </div>
                            <div class="col-md-4">
                            <div class="form-group">
                                <th>สถาบันที่จบการศึกษา:</th>
                                    <input type="text" name="instname" class="form-control" value="{{isset($profressor)?$profressor->inst_name:''}}"/>
                            </div>
                            </div>
                    </div>
                </div> 
            </div>   
                <div class="panel panel-primary w3-card">  
                    <div class="panel-heading">ข้อมูลสถาบันที่ต้องการไปศึกษาต่อ</div>
                        <div class="panel-body">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label >สถาบัน</label>
                                    <select style="width:80%" name="inst_id">
                                        <option value="all">
                                            ทั้งหมด
                                        </option>
                                    @foreach($institution as $index => $row)
                                        <option value="{{$row->inst_id}}" {{isset($edus) && $edus->inst_id==$row->inst_id?'selected':''}}>
                                            {{$row->inst_name}}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label >คุณวุฒิ</label>
                                    <select style="width:80%" name="qua_id">
                                        <option value="all">
                                            ทั้งหมด
                                        </option>
                                    @foreach($qualification as $index => $roww)
                                        <option value="{{$roww->qua_id}}" {{isset($edus) && $edus->qua_id==$roww->qua_id?'selected':''}}>
                                            {{$roww->qua_name}}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label >ระดับ</label>
                                    <select style="width:80%" name="degr_id">
                                        <option value="all">
                                            ทั้งหมด
                                        </option>
                                    @foreach($degree as $index => $rowww)
                                        <option value="{{$rowww->degr_id}}" {{isset($edus) && $edus->degr_id==$rowww->degr_id?'selected':''}}>
                                            {{$rowww->degr_name}}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label >สาขา</label>
                                    <select style="width:80%" name="bra_id">
                                        <option value="all">
                                            ทั้งหมด
                                        </option>
                                    @foreach($branch as $index => $rowwww)
                                        <option value="{{$rowwww->bra_id}}" {{isset($edus) && $edus->bra_id==$rowwww->bra_id?'selected':''}}>
                                            {{$rowwww->bra_name}}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>  
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <th>ปีที่ไป:</th>
                                    <select style="width:80%" name="start_year">
                                        <option value="all">
                                            ทั้งหมด
                                        </option>
                                    @for($i=date('Y');$i<(date('Y')+10);$i++)
                                        <option value="{{$i+543}}" {{isset($edus) && $edus->start_year==($i+543)?'selected':''}}>
                                            {{$i+543}}
                                        </option>
                                    @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <th>ปีที่คาดว่าจะจบ:</th>
                                    <select style="width:80%" name="end_year">
                                        <option value="all">
                                            ทั้งหมด
                                        </option>
                                    @for($i=date('Y');$i<(date('Y')+10);$i++)
                                        <option value="{{$i+543}}" {{isset($edus) && $edus->end_year==($i+543)?'selected':''}}>
                                            {{$i+543}}
                                        </option>
                                    @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                            <div class="form-group">
                                <th>วิทยานิพนธ์:</th>
                                    <input type="text" name="thesis" class="form-control" value="{{isset($edus)?$edus->thesis:''}}"/>
                            </div>
                            </div>
                            <div class="col-md-12">
                            <div class="form-group">
                                <th>หมายเหตุ:</th>
                                    <textarea  row="20" name="detail" class="form-control" value="{{isset($edus)?$edus->detail:''}}"/></textarea>
                            </div>
                            </div>
                        </div>
                    <button class="btn">ยืนยัน</button>
                </div> 
            </div> 
        <div class="col-md-1">   
    </div>
</div>
@endsection
