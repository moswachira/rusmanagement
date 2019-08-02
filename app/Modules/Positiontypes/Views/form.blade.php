@extends('custom-layout')
@section('title')
@section('content' )
<div class="row">
        <div class="col-md-2">   
        </div>
          <div class="col-md-8">   
            <div class="panel panel-default">
                <a herf="/positiontypes"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($positiontypes))
                    ประเภท : {{$positiontypes->pos_name}}
                    @else
                    เพิ่มประเภท
                    @endif
                </div>
                @if(isset($positiontypes))
                <form action="/positiontypes/{{$positiontypes->pos_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf();
                @else
                <form class="form-ajax" action="/positiontypes" method="POST">
                @csrf();
                @endif
                    <div class="panel-body">
                        <th>ประเภท :</th>
                    <input type="text" name="posname" class="form-control" value="{{isset($positiontypes)?$positiontypes->pos_name:''}}"/>
                    </div> 
                    <button class="btn">ยืนยัน</button>
                </form>
            </div> 
        <div class="col-md-2">   
        </div>
</div>
@endsection
