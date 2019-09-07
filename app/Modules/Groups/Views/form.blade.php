@extends('custom-layout')
@section('title')
@section('content' )
<div class="row">
        <div class="col-md-2">   
        </div>
          <div class="col-md-8">   
            <div class="panel panel-primary w3-card">
                <a herf="/groups"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($groups))
                    กลุ่ม : {{$groups->gro_name}}
                    @else
                    เพิ่มกลุ่ม 
                    @endif
                    <a class="btn btn-default pull-right" href="/groups/" style="padding-top: 2px;padding-bottom: 2px;" data-toggle="tooltip" title=""><i class="fa fa-close"></i></a>
                </div>
                @if(isset($groups))
                <form action="/groups/{{$groups->gro_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf()
                @else
                <form class="form-ajax" action="/groups" method="POST">
                @csrf()
                @endif
                    <div class="panel-body">
                        <th>กลุ่ม :</th>
                    <input type="text" name="groname" class="form-control" value="{{isset($groups)?$groups->gro_name:''}}"/>
                    </div> 
                    <button class="btn">ยืนยัน</button>
                </form>
            </div> 
        <div class="col-md-2">   
        </div>
</div>
@endsection
