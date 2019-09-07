@extends('custom-layout')
@section('title')
@section('content' )
<div class="row">
        <div class="col-md-2">   
        </div>
          <div class="col-md-8">   
            <div class="panel panel-primary w3-card">
                <a herf="/type"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($type))
                    ประเภทแหล่งเผยแพร่ : {{$type->acatype_name}}
                    @else
                    เพิ่มประเภทแหล่งเผยแพร่
                    @endif
                    <a class="btn btn-default pull-right" href="/type/" style="padding-top: 2px;padding-bottom: 2px;" data-toggle="tooltip" title=""><i class="fa fa-close"></i></a>
                </div>
                @if(isset($type))
                <form action="/type/{{$type->acatype_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf()
                @else
                <form class="form-ajax" action="/type" method="POST">
                @csrf()
                @endif
                    <div class="panel-body">
                        <th>ชื่อประเภทแหล่งเผยแพร่:</th>
                    <input type="text" name="acatypename" class="form-control" value="{{isset($type)?$type->acatype_name:''}}"/>
                    </div> 
                    <button class="btn">ยืนยัน</button>
                </form>
            </div> 
        <div class="col-md-2">   
        </div>
</div>
@endsection
