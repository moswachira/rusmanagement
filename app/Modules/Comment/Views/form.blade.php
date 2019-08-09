@extends('custom-layout')
@section('title')
@section('content' )
<div class="row">
        <div class="col-md-2">   
        </div>
          <div class="col-md-8">   
            <div class="panel panel-default">
                <a herf="/comment"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($comment))
                    คอมเม้นอบรม : {{$comment->com_name}}
                    @else
                    เพิ่มคอมเม้น
                    @endif
                </div>
                @if(isset($comment))
                <form action="/comment/{{$comment->com_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf()
                @else
                <form class="form-ajax" action="/comment" method="POST">
                @csrf()
                @endif
                    <div class="panel-body">
                        <th>คอมเม้น :</th>
                    <input type="text" name="comname" class="form-control" value="{{isset($comment)?$comment->com_name:''}}"/>
                    </div> 
                    <button class="btn">ยืนยัน</button>
                </form>
            </div> 
        <div class="col-md-2">   
        </div>
</div>
@endsection
