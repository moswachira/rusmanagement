@extends('custom-layout')
@section('title')
@section('content' )
<div class="row">
        <div class="col-md-2">   
        </div>
          <div class="col-md-8">   
            <div class="panel panel-default">
                <a herf="/branchs"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($branchs))
                    สาขา : {{$branchs->bra_name}}
                    @else
                    เพิ่มสาขา
                    @endif
                </div>
                @if(isset($branchs))
                <form action="/branchs/{{$branchs->bra_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf();
                @else
                <form class="form-ajax" action="/branchs" method="POST">
                @csrf();
                @endif
                    <div class="panel-body">
                        <th>สาขา :</th>
                    <input type="text" name="braname" class="form-control" value="{{isset($branchs)?$branchs->bra_name:''}}"/>
                    </div> 
                    <button class="btn">ยืนยัน</button>
                </form>
            </div> 
        <div class="col-md-2">   
        </div>
</div>
@endsection