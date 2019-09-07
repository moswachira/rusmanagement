@extends('custom-layout')
@section('title')
@section('content' )
<div class="row">
        <div class="col-md-2">   
        </div>
          <div class="col-md-8">   
            <div class="panel panel-primary w3-card">
                <a herf="/program"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($programs))
                    การสอน : {{$programs->program_name}}
                    @else
                    เพิ่มการสอน
                    @endif
                    <a class="btn btn-default pull-right" href="/program/" style="padding-top: 2px;padding-bottom: 2px;" data-toggle="tooltip" title=""><i class="fa fa-close"></i></a>
                </div>
                @if(isset($programs))
                <form action="/program/{{$programs->program_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf()
                @else
                <form class="form-ajax" action="/program" method="POST">
                @csrf()
                @endif
                    <div class="panel-body">
                    <div class="form-group">
                        <label >เทอม</label>
                        <select name="term_id">
                            <option value="">
                                ทั้งหมด
                            </option>
                        @foreach($term as $index => $row)
                            <option value="{{$row->term_id}}" {{isset($programs)&& $programs->term_id==$row->term_id?'selected':''}}>
                                {{$row->termn}}
                            </option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label >ปีการศึกษา</label>
                        <select name="term_id">
                            <option value="all">
                                ทั้งหมด
                            </option>
                        @foreach($term as $index => $roww)
                            <option value="{{$roww->term_id}}" {{isset($programs)&& $programs->term_id==$roww->term_id?'selected':''}}>
                                {{$roww->year}}
                            </option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label >วิชา</label>
                        <select name="sub_id">
                            <option value="all">
                                ทั้งหมด
                            </option>
                        @foreach($subjects as $index => $rowww)
                            <option value="{{$rowww->sub_id}}" {{isset($programs)&& $programs->sub_id==$rowww->sub_id?'selected':''}}>
                                {{$rowww->sub_name}}
                            </option>
                        @endforeach
                        </select>
                    </div>
                    <button class="btn">ยืนยัน</button>
                </form>
            </div> 
        <div class="col-md-2">   
        </div>
</div>
@endsection
