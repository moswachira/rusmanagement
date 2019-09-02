@extends('custom-layout')
@section('title')
@section('content' )
<div class="row">
        <div class="col-md-2">   
        </div>
          <div class="col-md-10">   
            <div class="panel panel-primary w3-card">
                <a herf="/soure"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($soures))
                    แหล่งทุน : {{$soures->sour_name}}
                    @else
                    เพิ่มแหล่งทุน
                    @endif
                </div>
                @if(isset($soures))
                <form action="/soure/{{$soures->sour_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf()
                @else
                <form class="form-ajax" action="/soure" method="POST">
                @csrf()
                @endif
                    <div class="panel-body">
                    <div class="form-group">
                        <th>ชื่อแหล่งทุน:</th>
                    <input type="text" name="sourname" class="form-control" value="{{isset($soures)?$soures->sour_name:''}}"/>
                    </div>
                    <div class="form-group">
                        <label >ประเภทแหล่งทุน</label>
                        <select name="sout_id">
                            <option value="all">
                                ทั้งหมด
                            </option>
                        @foreach($souretype as $index => $row)
                            <option value="{{$row->sout_id}}" {{isset($soures)&& $soures->sout_id==$row->sout_id?'selected':''}}>
                                {{$row->sout_name}}
                            </option>
                        @endforeach
                        </select>
                    </div>
                    <button class="btn">ยืนยัน</button>
                </form>
            </div> 
        <div class="col-md-2">   
        </div>
</div>
@endsection
