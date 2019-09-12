@extends('custom-layout')
@section('title')
@section('content' )
<ul class="breadcrumb w3-card">
  <li><a href="/"><i class="fa fa-home"> หน้าแรก</i></a></li>
  <li><a href="/assignment"><i class="fa fa-user"> รายการการมอบหมายงาน</i></a></li>
    @if(CurrentUser::permission([3]))
        <li><i class="fa fa-edit"> แก้ไขรายละเอียดงาน</i></li>
    @elseif(CurrentUser::permission([1,2]))
        <li><i class="fa fa-plus"> รายละเอียดการมอบหมายงาน</i></li>
    @else
        <li><i class="fa fa-plus"> เพิ่มการมอบหมายงาน</i></li>
    @endif
</ul>
<div class="row">
        <div class="col-md-1">   
        </div>
          <div class="col-md-10">   
            <div class="panel panel-primary w3-card">
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($assignments))
                    แก้ไขรายละเอียดงาน : {{$assignments->ass_name}}
                    @else
                    เพิ่มการมอบหมายงาน
                    @endif
                    <a class="btn btn-default pull-right" href="/assignment/" style="padding-top: 2px;padding-bottom: 2px;" data-toggle="tooltip" title="กลับหน้าสิทธิ์"><i class="fa fa-close"></i></a>
                </div>
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
                            <input type="text" {{ (CurrentUser::permission([3]))? '':'disabled'}} name="ass_name" class="form-control" value="{{isset($assignments)?$assignments->ass_name:''}}"/">
                        </div>
                        <div class="form-group">
                            รายละเอียดงาน:
                            <input type="text" {{ (CurrentUser::permission([3]))? '':'disabled'}} name="detail" class="form-control" value="{{isset($assignments)?$assignments->detail:''}}"/">
                        </div>
                        <div class="form-group">
                            สถานที่:
                            <input type="text" {{ (CurrentUser::permission([3]))? '':'disabled'}} name="place" class="form-control" value="{{isset($assignments)?$assignments->place:''}}"/">
                        </div>
                        <div class="form-group">
                            วันที่เริ่ม:
                            <input type="date" {{ (CurrentUser::permission([3]))? '':'disabled'}} name="start_time" class="form-control" value="{{isset($assignments)?$assignments->start_time:''}}"/">
                        </div>
                        <div class="form-group">
                            วันที่เสร็จ:
                            <input type="date" {{ (CurrentUser::permission([3]))? '':'disabled'}} name="end_time" class="form-control" value="{{isset($assignments)?$assignments->end_time:''}}"/">
                        </div>
                    @if(CurrentUser::permission([3]))
                        <div class="form-group">
                            เลือกผู้รับผิดชอบ:
                            <select {{ (CurrentUser::permission([3]))? '':'disabled'}} class="job-assign" multiple="multiple" style="width:100%;height:120px;" name="tea_id[]">
                                    @foreach($teacher as $index => $roww)
                                        <option {{isset($teacher_selected) && in_array($roww->tea_id,$teacher_selected)?'selected':''}} value="{{$roww->tea_id}}">
                                    {{$roww->first_name}} {{$roww->last_name}}
                                        </option>
                                    @endforeach
                                        </select>
                        </div>
                    @endif
                    </div> 
                    @if(CurrentUser::permission([3]))
                    <button class="btn">ยืนยัน</button>
                    @endif
                 </form>
            </div> 
        <div class="col-md-1">   
    </div>
</div>
@endsection
