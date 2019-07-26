@extends('custom-layout')
@section('title')
@section('content' )
<div class="row">
        <div class="col-md-2">   
        </div>
          <div class="col-md-8">   
            <div class="panel panel-default">
                <a herf="/study"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($studys))
                    วิจัย : {{$studys->subject}}
                    @else
                    เพิ่มผลงานวิจัย
                    @endif
                </div>
                @if(isset($studys))
                <form action="/study/{{$studys->res_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf()
                @else
                <form class="form-ajax" action="/study" method="POST">
                @csrf()
                @endif
                    <div class="panel-body">
                    <div class="form-group">
                        <th>ชื่อ:</th>
                    <input type="text" name="firstname" class="form-control" value="{{CurrentUser::user()->first_name}}"/>
                    </div>
                    <div class="form-group">
                        <th>ชื่อโปรเจค:</th>
                    <input type="text" name="subject" class="form-control" value="{{isset($studys)?$studys->subject:''}}"/>
                    </div>
                    <th>รายละเอียด:</th>
                    <textarea  row="10" name="detail" class="form-control" >{{isset($studys)?$studys->detail:''}}</textarea>
                    <div class="form-group">
                    <th>ปี:</th>
                        <input type="date" name="year" class="form-control" value="{{isset($studys)?$studys->year:''}}"/>
                    </div>
                    <div class="form-group">
                        <label >แหล่งทุน</label>
                        <select name="sour_id">
                            <option value="all">
                                ทั้งหมด
                            </option>
                        @foreach($soure as $index => $row)
                            <option value="{{$row->sour_id}}" {{isset($studys)&& $studys->sour_id==$row->sour_id?'selected':''}}>
                                {{$row->sour_name}}
                            </option>
                        @endforeach
                        </select>
                    </div>
                        <div class="form-group">
                        <label >ประเภทแหล่งทุน</label>
                        <select name="sout_id">
                            <option value="all">
                                ทั้งหมด
                            </option>
                        @foreach($souretype as $index => $roww)
                            <option value="{{$roww->sout_id}}" {{isset($studys)&& $studys->sout_id==$roww->sout_id?'selected':''}}>
                                {{$roww->sout_name}}
                            </option>
                        @endforeach
                        </select>
                        </div>      
                    </div> 
                    <button class="btn">ยืนยัน</button>
                </form>
            </div> 
        <div class="col-md-2">   
        </div>
</div>
@endsection
