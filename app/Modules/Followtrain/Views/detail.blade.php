<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">ติดตามการนำไปใช้ประโยชน์</div>
        <div class="panel-body">
                <div class="form-group">
                            <label >ด้าน</label> {{$followtrain->side_name}}
                            
                        </div>  
                <div class="form-group">
                    <label for="detail">รายละเอียดการนำไปใช้ประโยชน์:</label> {{$followtrain->detail}}
                </div>
                <div class="form-group">
                    <label for="date">ระยะเวลาที่เริ่ม:</label> {{$followtrain->start_time}}
                </div>
                <div class="form-group">
                    <label for="date">ระยะเวลาสิ้นสุด:</label> {{$followtrain->end_time}}
                </div>
                <div class="form-group">
                    <label for="status">สถานะ:</label> {{$followtrain->status}}
                </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">แสดงความคิดเห็นของหัวหน้าสาขา </div>
        <div class="panel-body">
        {{$followtrain->comment}}
        </div>
    </div>
</div>