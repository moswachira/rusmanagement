@extends('custom-layout') 
@section('title','รายการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">ตารางความคืบหน้า</div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width:140px">#</th>
                                <th>เอกสาร</th>
                                <th>ผลงานวิจัย</th>
                                <th>ประเภทหนังสือ</th>
                                <th>ประเภทตำรา</th>
                                <th style="width:100px"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($requestlog as $index => $requestlogs)
                            <tr>                       
                                <td>{{$index+1}}</td>
                                <td>{{$requestlogs->percent_doc}}</td>
                                <td>{{$requestlogs->percent_study}}</td>
                                <td>{{$requestlogs->percent_book}}</td>
                                <td>{{$requestlogs->percent_text}}</td>
                                <td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>  
</div>
@endsection
