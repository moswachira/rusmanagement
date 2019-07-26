@extends('custom-layout')
@section('title')
@section('content' )

<div class="row">
        <div class="col-md-2">   
        </div>
          <div class="col-md-8">   
            <div class="panel panel-default">
                <a herf="/publishs"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($publish))
                    แหล่งเผยแพร่ : {{$publish->pub_name}}
                    @else
                    เพิ่มแหล่งเผยแพร่
                    @endif
                </div>
                @if(isset($publish))
                <form action="/publishs/{{$publish->pub_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf()
                @else
                <form class="form-ajax" action="/publishs" method="POST">
                @csrf()
                @endif
                    <div class="panel-body">
                    <div class="form-group">
                    <div class="form-group">
                        <th>ชื่อแห่งเผยแพร่:</th>
                    <input type="text" name="pubname" class="form-control" value="{{isset($publish)?$publish->pub_name:''}}"/>
                    </div>
                    <div class="form-group">
                        <th>วันเดือนปี:</th>
                    <input type="date" name="date" class="form-control" value="{{isset($publish)?$publish->date:''}}"/>
                    </div>
                    <div class="form-group">
                        <th>สถานที่:</th>
                    <input type="text" name="place" class="form-control" value="{{isset($publish)?$publish->place:''}}"/>
                    </div>
                    <button class="btn">ยืนยัน</button>
                </form>
            </div> 
        <div class="col-md-2">   
        </div>
</div>
@endsection
