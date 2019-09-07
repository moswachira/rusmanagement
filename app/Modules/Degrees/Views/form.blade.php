@extends('custom-layout')
@section('title')
@section('content' )
<div class="row">
        <div class="col-md-2">   
        </div>
          <div class="col-md-8">   
            <div class="panel panel-primary w3-card">
                <a herf="/degrees"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($degrees))
                    ระดับ : {{$degrees->degr_name}}
                    @else
                    เพิ่มระดับ
                    @endif
                    <a class="btn btn-default pull-right" href="/degrees/" style="padding-top: 2px;padding-bottom: 2px;" data-toggle="tooltip" title=""><i class="fa fa-close"></i></a>    
                </div>
                @if(isset($degrees))
                <form action="/degrees/{{$degrees->degr_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf()
                @else
                <form class="form-ajax" action="/degrees" method="POST">
                @csrf()
                @endif
                    <div class="panel-body">
                        <th>ระดับ :</th>
                    <input type="text" name="degrname" class="form-control" value="{{isset($degrees)?$degrees->degr_name:''}}"/>
                    </div> 
                    <button class="btn">ยืนยัน</button>
                </form>
            </div> 
        <div class="col-md-2">   
        </div>
</div>
@endsection
