@extends('custom-layout')
@section('title')
@section('content' )
<div class="row">
        <div class="col-md-2">   
        </div>
          <div class="col-md-8">   
            <div class="panel panel-primary w3-card">
                <a herf="/portfolio"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($port))
                    วิจัย : {{$port->por_name}}
                    @else
                    เพิ่มผลงานวิชาการ
                    @endif
                    <a class="btn btn-default pull-right" href="/portfolio/" style="padding-top: 2px;padding-bottom: 2px;" data-toggle="tooltip" title=""><i class="fa fa-close"></i></a>
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
                        <th>ชื่อ:</th>
                    <input type="text" name="firstname" class="form-control" value="{{CurrentUser::user()->first_name}}"/>
                    </div>
                    <div class="form-group">
                        <th>ชื่อผลงานวิชาการ:</th>
                    <input type="text" name="por_name" class="form-control" value="{{isset($port)?$port->por_name:''}}"/>
                    </div>
                    <th>รายละเอียด:</th>
                    <textarea  row="10" name="detail" class="form-control" >{{isset($port)?$port->detail:''}}</textarea>
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
                            <option value="{{$rowww->pub_id}}" {{isset($port)&& $port->pub_id==$rowww->pub_id?'selected':''}}>
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
                            <option value="{{$row->acatype_id}}" {{isset($port)&& $port->acatype_id==$row->acatype_id?'selected':''}}>
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
                            <option value="{{$roww->gro_id}}" {{isset($port)&& $port->gro_id==$roww->gro_id?'selected':''}}>
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
