@extends('custom-layout')
@section('title')
@section('content' )
<div class="row">
        <div class="col-md-2">   
        </div>
          <div class="col-md-8">   
            <div class="panel panel-default">
                <a herf="/term"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($terms))
                    ภาคเรียน : {{$terms->term_name}}
                    @else
                    เพิ่มเทอม
                    @endif
                </div>
                @if(isset($terms))
                <form action="/term/{{$terms->term_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf()
                @else
                <form class="form-ajax" action="/term" method="POST">
                @csrf()
                @endif
                    <div class="panel-body">
                        <th>ภาคเรียน:</th>
                    <input type="text" name="termname" class="form-control" value="{{isset($terms)?$terms->term_name:''}}"/>
                    <button class="btn">ยืนยัน</button>
                </form>
            </div> 
        <div class="col-md-2">   
        </div>
</div>
@endsection