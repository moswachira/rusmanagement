@extends('custom-layout')
@section('title')
@section('content' )
<div class="row">
        <div class="col-md-2">   
        </div>
            <div class="col-md-8">   
                <div class="panel panel-primary w3-card">
                    <a herf="/requestlog"กลับหน้าหลัก></a>
                    <div class="panel-heading" style="font-size: 20px;">
                      ความคืบหน้า(%)
                    </div>
                    <form action="/requestlog/{{$req_id}}" class="form-ajax" method="PUT">
                        <input type="hidden" value="put" name="_methods">
                        <div class="panel-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <th>เอกสาร(%):</th>
                                        <input   type="text" maxlength="3" name="percent_doc" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <th>ผลงานวิจัย(%):</th>
                                        <input {{$request->select_study=='N'?'readonly':''}} value="0" type="text" maxlength="3" name="percent_study" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <th>ประเภทหนังสือ(%):</th>
                                        <input {{$request->select_book=='N'?'readonly':''}} value="0" type="text" maxlength="3" name="percent_book" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <th>ประเภทตำรา(%):</th>
                                        <input {{$request->select_text=='N'?'readonly':''}} value="0" type="text" maxlength="3" name="percent_text" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <button class="btn">ยืนยัน</button>
                    </form>
                </div> 
            </div> 
        <div class="col-md-2">   
    </div>
</div>
@endsection
