@extends('custom-layout') 
@section('title','เพิ่มราการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<div class="row">
        <div class="col-md-2">   
        </div>
          <div class="col-md-8">   
            <div class="panel panel-default">
              <div class="panel-heading">การนำไปใช้ประโยชน์</div>
                <div class="panel-body">
                  <div class="form-group">
                    <label for="email">สรุปสาระการนำไปใช้ประโยชน์:</label>
                      <input type="email" class="form-control" id="email">
                  </div>
                        <div class="form-group">
                          <label for="email">ตำแหน่ง:</label>
                            <input type="email" class="form-control" id="email">
                      </div>
                </div>  
              </div> 
        <div class="col-md-2">   
        </div>
</div>
@endsection