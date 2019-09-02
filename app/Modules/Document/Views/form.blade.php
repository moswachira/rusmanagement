@extends('custom-layout')
@section('title')
@section('content' )
<div class="row">
        <div class="col-md-2">   
        </div>
          <div class="col-md-8">   
            <div class="panel panel-primary w3-card">
                <a herf="/document"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($documents))
                    ระดับ : {{$documents->doc_name}}
                    @else
                    เพิ่มระดับ
                    @endif
                </div>
                @if(isset($documents))
                <form action="/document/{{$documents->doc_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf()
                @else
                <form class="form-ajax" action="/document" method="POST">
                @csrf()
                @endif
                    <div class="panel-body">
                        <th>ระดับ :</th>
                    <input type="text" name="docname" class="form-control" value="{{isset($documents)?$documents->doc_name:''}}"/>
                    </div> 
                    <button class="btn">ยืนยัน</button>
                </form>
            </div> 
        <div class="col-md-2">   
        </div>
</div>
@endsection
