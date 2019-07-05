@extends('custom-layout') 
@section('title','รายการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<div class="row">
    <div class="col-md-3">  
        <div class="panel panel-default">
            <div class="panel-heading">Panel Content</div>
            <div class="panel-body">
                
            <form action="/action_page.php">
  <div class="form-group">
    <label for="email">Email address:</label>
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
        </div>
    </div>
    <div class="col-md-9">  
        <div class="panel panel-default">
            <div class="panel-heading">
                
            Panel Content
            <a class="pull-right" href="/profressor/create"><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มรายการใหม่</a>
        </div>
            <div class="panel-body">
               
            <table class="table">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th style="width:120px;"></th>
      </tr>
    </thead>
    <tbody>
        @for($i=0;$i<15;$i++)
        <tr>
            <td>John</td>
            <td>Doe</td>
            <td>john@example.com</td>
            <td class="text-center">
            <div class="btn-group">
  <button type="button" class="btn btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
  <button type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>
</div>
            </td>
        </tr>
      @endfor
    </tbody>
  </table>


            </div>
        </div>
    </div>
</div>
@endsection
