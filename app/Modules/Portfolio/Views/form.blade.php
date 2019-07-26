@extends('custom-layout')
@section('title')
@section('content' )
<div class="row">
        <div class="col-md-2">   
        </div>
          <div class="col-md-8">   
            <div class="panel panel-default">
                <a herf="/portfolio"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($port))
                    แหล่งเผยแพร่ผลงาน : {{$port->por_name}}
                    @else
                    เพิ่มแหล่งเผยแพร่ผลงาน
                    @endif
                </div>
                @if(isset($port))
                <form action="/portfolio/{{$port->por_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf()
                @else
                <form class="form-ajax" action="/portfolio" method="POST">
                @csrf()
                @endif
                    <div class="panel-body">
                    <div class="form-group">
                            <th>ชื่อผลงาน:</th>
                        <input type="text" name="porname" class="form-control" value="{{isset($port)?$port->por_name:''}}"/>
                    </div>
                    <div class="form-group">
                            <th>คะแนน:</th>
                        <input type="text" name="score" class="form-control" value="{{isset($port)?$port->score:''}}"/>
                    </div> 
                    <div class="form-group">
                            <label >แหล่งเผยแพร่</label>
                            <select name="pub_id">
                                <option value="all">
                                    ทั้งหมด
                                </option>
                            @foreach($publish as $index => $rowww)
                            <option value="{{$rowww->pub_id}}" {{Input::get('pub_id')==$rowww->pub_id?'selected':''}}>
                            {{$rowww->pub_name}}
                            </option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label >ประเภท</label>
                            <select name="acatype_id">
                                <option value="all">
                                    ทั้งหมด
                                </option>
                            @foreach($academictype as $index => $row)
                            <option value="{{$row->acatype_id}}" {{Input::get('acatype_id')==$row->acatype_id?'selected':''}}>
                            {{$row->acatype_name}}
                            </option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label >กลุ่ม</label>
                            <select name="gro_id">
                                <option value="all">
                                    ทั้งหมด
                                </option>
                            @foreach($group as $index => $roww)
                            <option value="{{$roww->gro_id}}" {{Input::get('gro_id')==$roww->gro_id?'selected':''}}>
                            {{$roww->gro_name}}
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
