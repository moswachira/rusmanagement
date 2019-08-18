@extends('custom-layout')
@section('title')
@section('content' )
<div class="row">
        <div class="col-md-2">   
        </div>
          <div class="col-md-8">   
            <div class="panel panel-default">
                <a herf="/profressor"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($profressor))
                    อาจารย์ : {{$profressor->first_name}}
                    @else
                    เพิ่มอาจารย์
                    @endif
                </div>
                @if(isset($profressor))
                <form action="/profressor/{{$profressor->tea_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf()
                @else
                <form class="form-ajax" action="/profressor" method="POST">
                @csrf()
                @endif
                    <div class="panel-body">
                    <div class="form-group">
                        <th>ชื่อ:</th>
                    <input type="text" name="firstname" class="form-control" value="{{isset($profressor)?$profressor->first_name:''}}"/>
                    </div>
                    <div class="form-group">
                    <th>นามสกุล:</th>
                        <input type="text" name="lastname" class="form-control" value="{{isset($profressor)?$profressor->last_name:''}}"/>
                    </div>
                    <th>รายละเอียด:</th>
                    <textarea  row="10" name="detail" class="form-control" >{{isset($profressor)?$profressor->detail:''}}</textarea>
                    <div class="form-group">
                    <th>email:</th>
                        <input type="text" name="email" class="form-control" value="{{isset($profressor)?$profressor->email:''}}"/>
                    </div>
                    <div class="form-group">
                    <th>เพศ:</th><br>
                        <input name="gender" type="radio" {{isset($profressor) && $profressor->gender=='ชาย'?'checked':''}} value="ชาย"/>ชาย<br>
                    </div>
                    <div class="form-group">
                        <input name="gender" type="radio" {{isset($profressor) && $profressor->gender=='หญิง'?'checked':''}} value="หญิง"/>หญิง
                    </div>
                    <div class="form-group">
                        <label >ระดับ</label>
                        <select name="degr_id">
                            <option value="all">
                                ทั้งหมด
                            </option>
                        @foreach($degree as $index => $row)
                            <option value="{{$row->degr_id}}" {{isset($profressor) && $profressor->degr_id==$row->degr_id?'selected':''}}>
                                {{$row->degr_name}}
                            </option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label >คุณวุฒิ</label>
                        <select name="qua_id">
                            <option value="all">
                                ทั้งหมด
                            </option>
                        @foreach($qualification as $index => $roww)
                            <option value="{{$roww->qua_id}}" {{isset($profressor) && $profressor->qua_id==$roww->qua_id?'selected':''}}>
                                {{$roww->qua_name}}
                            </option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label >สาขา</label>
                        <select name="bra_id">
                            <option value="all">
                                ทั้งหมด
                            </option>
                        @foreach($branch as $index => $rowww)
                            <option value="{{$rowww->bra_id}}" {{isset($profressor) && $profressor->bra_id==$rowww->bra_id?'selected':''}}>
                                {{$rowww->bra_name}}
                            </option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label >สถาบัน</label>
                        <select name="inst_id">
                            <option value="all">
                                ทั้งหมด
                            </option>
                        @foreach($institution as $index => $rowwww)
                            <option value="{{$rowwww->inst_id}}" {{isset($profressor) && $profressor->inst_id==$rowwww->inst_id?'selected':''}}>
                                {{$rowwww->inst_name}}
                            </option>
                        @endforeach
                        </select>
                    </div>
                        <div class="form-group">
                        <label >ตำแหน่ง</label>
                        <select name="aca_id">
                            <option value="all">
                                ทั้งหมด
                            </option>
                        @foreach($academic as $index => $rowwwww)
                            <option value="{{$rowwwww->aca_id}}" {{isset($profressor) && $profressor->aca_id==$rowwwww->aca_id?'selected':''}}>
                                {{$rowwwww->aca_name}}
                            </option>
                        @endforeach
                        </select>
                        </div>
                        <div class="panel panel-default">
                        <div class="panel-heading">แผนการสอน</div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>เทอม</th>
                                        <th>วิชา</th>
                                        <th style="width:120px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($program as $index => $rowwwwww)
                                    <tr>                       
                                        <td>{{$index+1}}</td>
                                        <td>{{$rowwwwww->term_name}}</td>
                                        <td>{{$rowwwwww->sub_name}}</td>
                                        <td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                        <div class="form-group">
                        <th>Username:</th>
                    <input type="text" name="username" autocomplate="off" class="form-control" value="{{isset($profressor)?$profressor->username:''}}"/>
                    </div>
                    <div class="form-group">
                        <th>Password:</th>
                    <input type="password" name="password" class="form-control" />
                    </div>      
                    </div> 
                    <button class="btn">ยืนยัน</button>
                </form>
            </div> 
        <div class="col-md-2">   
        </div>
</div>
@endsection
