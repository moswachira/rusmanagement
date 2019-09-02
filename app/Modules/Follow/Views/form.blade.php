<div class="col-md-12">
    <div class="panel panel-primary w3-card">
        <div class="panel-heading">ติดตามการนำไปใช้ประโยชน์</div>
        <div class="panel-body">
            <form action="/follow" class="form-ajax" method="POST">
                <input type ="hidden" name ="edu_id" value="{{$edu_id}}"/>
                <div class="form-group">
                    <label for="detail">รายละเอียดการศึกษาต่อ:</label>
                    <textarea  row="10" name="detail" class="form-control" ></textarea>
                </div>
                <div class="form-group">
                    <label for="date">วัน:</label>
                    <input type="date" class="form-control" name="date" id="date">
                </div>
                <div class="form-group">
                    <label for="status">สถานะ:</label>
                    <select class="form-control" name="status">
                        <option value="กำลังศึกษาอยู่">กำลังศึกษาอยู่</option>
                        <option value="จบการศึกษาแล้ว">จบการศึกษาแล้ว</option>
                    </select>
                </div>
                <button type="submit">ยืนยัน</button>
            </form>
        </div>
    </div>
</div>