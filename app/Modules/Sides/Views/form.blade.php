@extends('custom-layout')
@section('title')
@section('content' )
<div class="row">
        <div class="col-md-2">   
        </div>
          <div class="col-md-8">   
            <div class="panel panel-primary w3-card">
                <a herf="/sides"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($sides))
                    ด้าน : {{$sides->side_name}}
                    @else
                    เพิ่มด้าน
                    @endif
                    <a class="btn btn-default pull-right" href="/sides/" style="padding-top: 2px;padding-bottom: 2px;" data-toggle="tooltip" title=""><i class="fa fa-close"></i></a>
                </div>
                @if(isset($sides))
                <form action="/sides/{{$sides->side_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf()
                @else
                <form class="form-ajax" action="/sides" method="POST">
                @csrf()
                @endif
                    <div class="panel-body">
                        <th>ด้าน :</th>
                    <input type="text" name="sidename" class="form-control" value="{{isset($sides)?$sides->side_name:''}}"/>
                    </div> 
                    <button class="btn">ยืนยัน</button>
                </form>
            </div> 
        <div class="col-md-2">   
        </div>
</div>
@endsection
