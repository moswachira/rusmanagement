@extends('custom-layout')
@section('title')
@section('content' )
<div class="row">
        <div class="col-md-2">   
        </div>
          <div class="col-md-8">   
            <div class="panel panel-primary w3-card">
                <a herf="/publishs"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($publishs))
                    แหล่งเผยแพร่ : {{$publishs->pub_name}}
                    @else
                    เพิ่มแหล่งเผยแพร่
                    @endif
                </div>
                @if(isset($publishs))
                <form action="/publishs/{{$publishs->pub_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf();
                @else
                <form class="form-ajax" action="/publishs" method="POST">
                @csrf();
                @endif
                    <div class="panel-body">
                        <th>ชื่อแหล่งเผยแพร่ผลงาน :</th>
                    <input type="text" name="pubname" class="form-control" value="{{isset($publishs)?$publishs->pub_name:''}}"/>
                    </div> 
                    <div class="panel-body">
                        <th>วันเดือนปี :</th>
                    <input type="date" name="date" class="form-control" value="{{isset($publishs)?$publishs->date:''}}"/>
                    </div> 
                    <div class="panel-body">
                        <th>สถานที่ :</th>
                    <input type="text" name="place" class="form-control" value="{{isset($publishs)?$publishs->place:''}}"/>
                    </div> 
                    <button class="btn">ยืนยัน</button>
                </form>
            </div> 
        <div class="col-md-2">   
        </div>
</div>
@endsection
