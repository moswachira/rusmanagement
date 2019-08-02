@extends('custom-layout')
@section('title')
@section('content' )
<div class="row">
        <div class="col-md-2">   
        </div>
          <div class="col-md-8">   
            <div class="panel panel-default">
                <a herf="/qualification"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($quas))
                    คุณวุฒิ : {{$quas->qua_name}}
                    @else
                    เพิ่มคุณวุฒิ 
                    @endif
                </div>
                @if(isset($quas))
                <form action="/qualification/{{$quas->qua_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf();
                @else
                <form class="form-ajax" action="/qualification" method="POST">
                @csrf();
                @endif
                    <div class="panel-body">
                        <th>คุณวุฒิ :</th>
                    <input type="text" name="quaname" class="form-control" value="{{isset($quas)?$quas->qua_name:''}}"/>
                    </div> 
                    <button class="btn">ยืนยัน</button>
                </form>
            </div> 
        <div class="col-md-2">   
        </div>
</div>
@endsection
