@extends('custom-layout')
@section('title')
@section('content' )
<div class="row">
        <div class="col-md-2">   
        </div>
          <div class="col-md-8">   
            <div class="panel panel-primary w3-card">
                <a herf="/typesoure"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 25px;">
                    @if(isset($souretypes))
                    ประเภทแหล่งทุน : {{$souretypes->sout_name}}
                    @else
                    เพิ่มประเภท
                    @endif
                </div>
                @if(isset($souretypes))
                <form action="/typesoure/{{$souretypes->sout_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf();
                @else
                <form class="form-ajax" action="/typesoure" method="POST">
                @csrf();
                @endif
                    <div class="panel-body">
                        <th>ประเภทแหล่งทุน:</th>
                    <input type="text" name="soutname" class="form-control" value="{{isset($souretypes)?$souretypes->sout_name:''}}"/>
                    </div> 
                    <button class="btn">ยืนยัน</button>
                </form>
            </div> 
        <div class="col-md-2">   
        </div>
</div>
@endsection
