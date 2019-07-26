@extends('custom-layout')
@section('title')
@section('content' )
<div class="row">
        <div class="col-md-2">   
        </div>
          <div class="col-md-8">   
            <div class="panel panel-default">
                <a herf="/reports"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($reports))
                    รายงานการติดตามการนำใช้ประโยชน์ : {{$reports->side}}
                    @else
                    เพิ่มรายงานการติดตาม
                    @endif
                </div>
                @if(isset($reports))
                <form action="/reports/{{$reports->rep_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf();
                @else
                <form class="form-ajax" action="/reports" method="POST">
                @csrf();
                @endif
                    <div class="panel-body">
                        <th>ด้าน:</th>
                    <input type="text" name="side" class="form-control" value="{{isset($reports)?$reports->side:''}}"/>
                        <th>วันเดือนปี:</th>
                    <input type="date" name="date" class="form-control" value="{{isset($reports)?$reports->date:''}}"/>
                    </div> 
                    <button class="btn">ยืนยัน</button>
                </form>
            </div> 
        <div class="col-md-2">   
        </div>
</div>
@endsection
