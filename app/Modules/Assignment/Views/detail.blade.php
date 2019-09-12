@extends('custom-layout')
@section('title')
@section('content' )
<div class="col-md-12">
@if(isset($assignments))
                <form action="/assignment/{{$assignments->ass_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf()
                @else
                <form class="form-ajax" action="/assignment" method="POST">
                @csrf()
                @endif
    <div class="panel-body">
        <div class="form-group">
            ชื่องาน:
            {{$assignments->ass_name}}
        </div>
        <div class="form-group">
            รายละเอียดงาน:
            {{$assignments->detail}}
        </div>
        <div class="form-group">
            สถานที่:
            {{$assignments->place}}
        </div>
        <div class="form-group">
            วันที่เริ่ม:
            {{$assignments->end_time}}
        </div>
        <div class="form-group">
            วันที่เสร็จ:
            {{$assignments->end_time}}
        </div>
    </div> 
    </form>
@endsection
