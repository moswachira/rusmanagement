<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">ติดตามการนำไปใช้ประโยชน์</div>
        <div class="panel-body">
            <form action="/followtrain" class="form-ajax" method="POST">
                <input type ="hidden" name ="tra_id" value="{{$tra_id}}"/>
                <div class="form-group">
                            <label >ด้าน</label>
                            <select style="width:80%" name="side_id">
                                <option value="all">
                                    กรุณาเลือก
                                </option>
                            @foreach($side as $index => $sides)
                                <option value="{{$sides->side_id}}">
                                    {{$sides->side_name}}
                                </option>
                            @endforeach
                            </select>
                        </div>  
                <div class="form-group">
                    <label for="detail">รายละเอียดการนำไปใช้ประโยชน์:</label>
                    <textarea  row="10" name="detail" class="form-control" ></textarea>
                </div>
                <div class="form-group">
                    <label for="date">ระยะเวลาที่เริ่ม:</label>
                    <input type="date" class="form-control" name="start_time" id="date">
                </div>
                <div class="form-group">
                    <label for="date">ระยะเวลาสิ้นสุด:</label>
                    <input type="date" class="form-control" name="end_time" id="date">
                </div>
                <div class="form-group">
                    <label for="status">สถานะ:</label>
                    <select class="form-control" name="status">
                        <option value="ผ่านการอบรม">ผ่านการอบรม</option>
                        <option value="ไม่ผ่านการอบรม">ไม่ผ่านการอบรม</option>
                    </select>
                </div>
                <button type="submit">ยืนยัน</button>
            </form>
        </div>
    </div>
</div>