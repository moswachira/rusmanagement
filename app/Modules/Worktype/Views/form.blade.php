@extends('custom-layout')
@section('title')
@section('content' )
<div class="row">
        <div class="col-md-2">   
        </div>
          <div class="col-md-8">   
            <div class="panel panel-primary w3-card">
                <a herf="/worktype"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($worktypes))
                    ประเภทงาน : {{$worktypes->wokt_name}}
                    @else
                    เพิ่มประเภทงาน
                    @endif
                </div>
                @if(isset($worktypes))
                <form action="/worktype/{{$worktypes->wokt_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf();
                @else
                <form class="form-ajax" action="/worktype" method="POST">
                @csrf();
                @endif
                    <div class="panel-body">
                        <th>ประเภทงาน:</th>
                    <input type="text" name="woktname" class="form-control" value="{{isset($worktypes)?$worktypes->wokt_name:''}}"/>
                    </div> 
                    <button class="btn">ยืนยัน</button>
                </form>
            </div> 
        <div class="col-md-2">   
        </div>
</div>
@endsection
