@extends('custom-layout')
@section('title')
@section('content' )
<div class="row">
        <div class="col-md-2">   
        </div>
          <div class="col-md-8">   
            <div class="panel panel-default">
                <a herf="/subjectss"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($subjectss))
                    วิชา : {{$subjectss->sub_name}}
                    @else
                    เพิ่มวิชา 
                    @endif
                </div>
                @if(isset($subjectss))
                <form action="/subjectss/{{$subjectss->sub_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf()
                @else
                <form class="form-ajax" action="/subjectss" method="POST">
                @csrf()
                @endif
                    <div class="panel-body">
                        <th>รหัสวิชา :</th>
                    <input type="text" name="subcode" class="form-control" value="{{isset($subjectss)?$subjectss->sub_code:''}}"/>
                    </div>
                    <div class="panel-body">
                        <th>วิชา :</th>
                    <input type="text" name="subname" class="form-control" value="{{isset($subjectss)?$subjectss->sub_name:''}}"/>
                    </div> 
                    <button class="btn">ยืนยัน</button>
                </form>
            </div> 
        <div class="col-md-2">   
        </div>
</div>
@endsection
