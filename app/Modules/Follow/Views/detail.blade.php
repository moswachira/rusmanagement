<div class="col-md-12">
    <div class="panel panel-primary w3-card">
        <div class="panel-heading">ติดตามการนำไปใช้ประโยชน์</div>
        <div class="panel-body">
                <div class="form-group">
                    <label for="detail">รายละเอียดการศึกษาต่อ:</label> {{$follow->detail}}
                </div>
                <div class="form-group">
                    <label for="date">วันเดือนปี:</label> {{$follow->date}}
                </div>
                <div class="form-group">
                    <label for="status">สถานะ:</label> {{$follow->status}}
                </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="panel panel-primary w3-card">
        <div class="panel-heading">แสดงความคิดเห็นของหัวหน้าสาขา </div>
        <div class="panel-body">
        {{$follow->commentplan}}
        </div>
    </div>
</div>