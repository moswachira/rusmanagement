@extends('custom-layout') 
@section('title','เพิ่มราการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="col-md-2">   
        </div>
        <div class="col-md-8">   
            <div class="panel panel-default">
            <div class="panel-heading">
           เพิ่ม/แก้ไข รายการอาจารย์ประจำมหาวิทยาลัย
        </div>
            <div class="panel-body">
            <form action="/action_page.php">
  <div class="form-group">
    <label for="email">ชื่อ-นามสกุล:</label>
    <input type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="email">ชื่อ-นามสกุล:</label>
    <input type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="email">ชื่อ-นามสกุล:</label>
    <input type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="email">ชื่อ-นามสกุล:</label>
    <input type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="email">ชื่อ-นามสกุล:</label>
    <input type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="email">ชื่อ-นามสกุล:</label>
    <input type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="email">ชื่อ-นามสกุล:</label>
    <input type="email" class="form-control" id="email">
  </div>

  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd">
  </div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>
<div class="col-md-2">   
</div>
            </div>
        </div>
    </div>
</div>
@endsection