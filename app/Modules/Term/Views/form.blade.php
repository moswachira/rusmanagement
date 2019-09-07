@extends('custom-layout')
@section('title')
@section('content' )
<div class="row">
        <div class="col-md-2">   
        </div>
          <div class="col-md-8">   
            <div class="panel panel-primary w3-card">
                <a herf="/term"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($terms))
                    ภาคเรียน : {{$terms->term_name}}
                    @else
                    เพิ่มเทอม
                    @endif
                    <a class="btn btn-default pull-right" href="/term/" style="padding-top: 2px;padding-bottom: 2px;" data-toggle="tooltip" title=""><i class="fa fa-close"></i></a>
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
                    <input type="text" name="termn" class="form-control" value="{{isset($terms)?$terms->termn:''}}"/>
                        <th>ปี:</th>
                    <input type="text" name="year" class="form-control" value="{{isset($terms)?$terms->year:''}}"/>
                    <button class="btn">ยืนยัน</button>
                </form>
            </div> 
        <div class="col-md-2">   
        </div>
</div>
@endsection
