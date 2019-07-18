@extends('custom-layout')
@section('title')
@section('content' )
<div class="row">
        <div class="col-md-2">   
        </div>
          <div class="col-md-8">   
            <div class="panel panel-default">
                <a herf="/"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">อาจารย์ : {{$profressor->first_name}}</div>
                <form action="/profressor/edit/{{$profressor->tea_id}}" method="POST">
                    <div class="panel-body">
                        <th>ชื่อ:</th>
                    <input type="text" name="firstname" class="form-control" value="{{$profressor->first_name}}"/>
                        <th>นามสกุล:</th>
                    <input type="text" name="lastname" class="form-control" value="{{$profressor->last_name}}"/>
                    <th>เพศ:</th>
                    <input type="text" name="gender" class="form-control" value="{{$profressor->gender}}"/>
                    <th>email:</th>
                    <input type="text" name="email" class="form-control" value="{{$profressor->email}}"/>
                    </div> 
                <input type="submit" value="ยืนยัน"/>
                </div> 
        <div class="col-md-2">   
        </div>
</div>
@endsection
