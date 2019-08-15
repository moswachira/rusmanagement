@extends('custom-layout')
@section('title')
@section('content' )
<div class="row">
        <div class="col-md-2">   
        </div>
          <div class="col-md-10">   
            <div class="panel panel-default">
                <a herf="/program"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($programs))
                    การสอน : {{$programs->program_name}}
                    @else
                    เพิ่มการสอน
                    @endif
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
                            <option value="all">
                                ทั้งหมด
                            </option>
                        @foreach($term as $index => $row)
                            <option value="{{$row->term_id}}" {{isset($programs)&& $programs->term_id==$row->term_id?'selected':''}}>
                                {{$row->term_name}}
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
                        @foreach($subjects as $index => $row)
                            <option value="{{$row->sub_id}}" {{isset($programs)&& $programs->sub_id==$row->sub_id?'selected':''}}>
                                {{$row->sub_name}}
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
