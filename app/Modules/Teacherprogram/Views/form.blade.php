@extends('custom-layout')
@section('title')
@section('content' )
<div class="row">
        <div class="col-md-2">   
        </div>
          <div class="col-md-8">   
            <div class="panel panel-default">
                <a herf="/teacherprogram"กลับหน้าหลัก></a>
                <div class="panel-heading" style="font-size: 20px;">
                    @if(isset($teacherprograms))
                    แผนการสอน : {{$teacherprograms->first_name}}
                    @else
                    เพิ่มแผนการสอน
                    @endif
                </div>
                @if(isset($teacherprograms))
                <form action="/teacherprogram/{{$teacherprograms->teapro_id}}" class="form-ajax" method="PUT">
                    <input type="hidden" value="put" name="_methods">
                    @csrf()
                @else
                <form class="form-ajax" action="/teacherprogram" method="POST">
                @csrf()
                @endif
                    <div class="panel-body">
                    <div class="form-group">
                        <label >อาจารย์</label>
                        <select name="tea_id">
                            <option value="all">
                                ทั้งหมด
                            </option>
                        @foreach($teacher as $index => $row)
                            <option value="{{$row->tea_id}}" {{isset($teacherprograms)&& $teacherprograms->tea_id==$row->tea_id?'selected':''}}>
                                {{$row->first_name}} 
                            </option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label >วิชา</label>
                        <select name="sub_id">
                            <option value="all">
                                ทั้งหมด
                            </option>
                        @foreach($subjects as $index => $roww)
                            <option value="{{$roww->sub_id}}" {{isset($teacherprograms)&& $teacherprograms->sub_id==$roww->sub_id?'selected':''}}>
                                {{$roww->sub_name}}
                            </option>
                        @endforeach
                        </select>
                    </div>
                        <div class="form-group">
                        <label >ภาคเรียน</label>
                        <select name="term_id">
                            <option value="all">
                                ทั้งหมด
                            </option>
                        @foreach($term as $index => $rowww)
                            <option value="{{$rowww->term_id}}" {{isset($teacherprograms)&& $teacherprograms->term_id==$rowww->term_id?'selected':''}}>
                                {{$rowww->term_name}}
                            </option>
                        @endforeach
                        </select>
                        </div>      
                    </div> 
                    <button class="btn">ยืนยัน</button>
                </form>
            </div> 
        <div class="col-md-2">   
        </div>
</div>
@endsection
