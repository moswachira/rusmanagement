@extends('custom-layout')
@section('title')
@section('content' )
<div class="row">
        <div class="col-md-2">   
        </div>
          <div class="col-md-8">   
            <div class="panel panel-primary w3-card">
                <a herf="/right"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($rights))
                    สิทธิ์ : {{$rights->right_name}}
                    @else
                    เพิ่มสิทธิ์
                    @endif
                </div>
                @if(isset($rights))
                <form action="/right/{{$rights->right_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf();
                @else
                <form class="form-ajax" action="/right" method="POST">
                @csrf();
                @endif
                    <div class="panel-body">
                        <th>ชื่อสิทธิ์:</th>
                    <input type="text" name="rightname" class="form-control" value="{{isset($rights)?$rights->right_name:''}}"/>
                    </div> 
                    <button class="btn">ยืนยัน</button>
                </form>
            </div> 
        <div class="col-md-2">   
        </div>
</div>
@endsection
