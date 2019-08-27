@extends('custom-layout')
@section('title')
@section('content' )
<div class="row">
    <div class="col-md-12">   
        <div class="panel panel-default">
            <a herf="/assignment"กลับหน้าหลัก></a>
            <div class="panel-heading" style="font-size: 20px;">
                @if(isset($assignment))
                รายละเอียดงานของอาจารย์ : {{$assignment->subject}}
                @else
                เพิ่มรายละเอียดงาน
                @endif
            </div>
            @if(isset($assignment))
            <form action="/assignment/{{$assignment->ass_id}}" class="form-ajax" method="PUT">
                <input type="hidden" value="put" name="_methods">
                @csrf()
            @else
            <form class="form-ajax" action="/assignment" method="POST">
            @csrf()
            @endif
                <div class="panel-body">
                <div class="form-group">
                    <th>รายละเอียดงาน:</th>
                <input type="text" name="ass_name" class="form-control" value="{{isset($assignment)?$assignment->ass_name:''}}"/>
                </div>
                <div class="form-group">
                    <label >ประเภทงาน</label>
                    <select name="wokt_id">
                        <option value="all">
                            ทั้งหมด
                        </option>
                    @foreach($worktype as $index => $row)
                        <option value="{{$row->wokt_id}}" {{isset($assignment)&& $assignment->wokt_id==$row->wokt_id?'selected':''}}>
                            {{$row->wokt_name}} 
                        </option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                <th>เวลาที่เริ่ม:</th>
                <input type="date" name="start_time" class="form-control" value="{{isset($assignment)?$assignment->start_time:''}}"/>
                <th>เวลาที่จบ:</th>
                <input type="date" name="end_time" class="form-control" value="{{isset($assignment)?$assignment->end_time:''}}"/>
                </div>
                <button class="btn">ยืนยัน</button>
            </form>
        </div >
    </div>
</div>
@endsection
