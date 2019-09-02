@extends('custom-layout')
@section('title')
@section('content' )
<div class="row">
        <div class="col-md-2">   
        </div>
          <div class="col-md-8">   
            <div class="panel panel-primary w3-card">
                <a herf="/institutions"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($institutions))
                    สถาบัน : {{$institutions->inst_name}}
                    @else
                    เพิ่มสถาบัน 
                    @endif
                </div>
                @if(isset($institutions))
                <form action="/institutions/{{$institutions->inst_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf();
                @else
                <form class="form-ajax" action="/institutions" method="POST">
                @csrf();
                @endif
                    <div class="panel-body">
                        <th>สถาบัน :</th>
                    <input type="text" name="instname" class="form-control" value="{{isset($institutions)?$institutions->inst_name:''}}"/>
                    </div> 
                    <button class="btn">ยืนยัน</button>
                </form>
            </div> 
        <div class="col-md-2">   
        </div>
</div>
@endsection
