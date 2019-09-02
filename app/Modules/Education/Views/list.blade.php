@extends('custom-layout') 
@section('title','รายการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-primary w3-card">
                <div class="panel-heading">ค้นหา</div>
                <div class="panel-body">
                    <form action="/education">
                        <div class="form-group">
                            <label for="keyword">คีย์เวร์ด</label>
                            <input type="text" name="keyword" value="{{Input::get('keyword')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label >ระดับ</label>
                            <select style="width:100%" name="degr_id">
                                <option value="all">
                                    ทั้งหมด
                                </option>
                            @foreach($degree as $index => $row)
                            <option value="{{$row->degr_id}}" {{Input::get('degr_id')==$row->degr_id?'selected':''}}>
                            {{$row->degr_name}}
                            </option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label >ตำแหน่ง</label>
                            <select style="width:100%" name="aca_id">
                                <option value="all">
                                    ทั้งหมด
                                </option>
                            @foreach($academic as $index => $roww)
                            <option value="{{$roww->aca_id}}" {{Input::get('aca_id')==$roww->aca_id?'selected':''}}>
                            {{$roww->aca_name}}
                            </option>
                            @endforeach
                            </select>
                        </div>     
                        <button type="submit" class="btn btn-default">ค้นหาอาจารย์</button>
                    </form>
                </div>
            </div>
           <a class="btn btn-default" href="/education/create">เพิ่มอาจารย์</a>
        </div> 
        <div class="col-md-10">
            <div class="panel panel-primary w3-card">
                <div class="panel-heading">ตารางแผนการศึกษาต่อ</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width:30px">#</th>
                                <th>ชื่อ-นามสกุล</th>
                                <th>สถาบันที่ไปศึกษาต่อ</th>
                                <th>ระดับ</th>
                                <th>ปีที่ไป-ปีที่คาดว่าจะจบ</th>
                                <th style="width:160px"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($education as $index => $edus)                   
                                <td>{{$index+1}}</td>
                                <td>{{$edus->first_name}} {{$edus->last_name}}</td>
                                <td>{{$edus->inst_name}}</td>
                                <td>{{$edus->degr_name}}</td>
                                <td>{{$edus->start_year}} {{$edus->end_year}}</td>
                                <td>
                                <div class="btn-group">
                                    <a class="btn btn-default" href="/follow/{{$edus->edu_id}}"><i class="fa fa-file-text-o"></i></a>
                                    @if(CurrentUser::permission([]))
                                    <a class="btn btn-default" href="/education/{{$edus->edu_id}}"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-default delete-item" href="/education/{{$edus->edu_id}}"><i class="fa fa-trash"></i></a>
                                    @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection
