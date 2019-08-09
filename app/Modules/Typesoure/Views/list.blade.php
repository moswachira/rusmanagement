@extends('custom-layout') 
@section('title','รายการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <form action="/typesoure">
                        <div class="form-group">
                            <label for="keyword">ค้นหา</label>
                            <input capitaltypee="text" name="keyword" value="{{Input::get('keyword')}}" class="form-control">
                        </div>  
                        <button capitaltypee="submit" class="btn btn-default">ค้นหาประเภท</button>
                    </form>
                </div>
            </div>
            @if(CurrentUser::permission([]))
           <a class="btn btn-default" href="/typesoure/create">เพิ่มแหล่งทุน</a>
           @endif
        </div> 
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">ตารางประเภทแหล่งทุน</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>รหัสประเภทแหล่งทุน</th>
                                <th>ประเภทแหล่งทุน</th>
                                <th style="width:200px"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($souretype as $index => $souretypes)
                            <tr>                       
                                <td>{{$index+1}}</td>
                                <td>{{$souretypes->sout_name}}</td>
                                <td>
                                    <div class="btn-group">
                                    @if(CurrentUser::permission([]))
                                    <a class="btn btn-default" href="/typesoure/{{$souretypes->sout_id}}"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-default delete-item" href="/typesoure/{{$souretypes->sout_id}}"><i class="fa fa-trash"></i></a>
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
