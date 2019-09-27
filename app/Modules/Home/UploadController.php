<?php

namespace App\Modules\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    public function index(Request $request)
    {
        $valid_file_extensions = array("jpg", "jpeg", "png", "pdf", "gif","docx","xlsx","pptx","doc");
        $extension = $request->file('userfile')->getClientOriginalExtension(); // getting image extension
        $extension = strtolower($extension);
        
        if (!in_array($extension, $valid_file_extensions))
        {
            return [
                'status' => 500,
                'message'=>'ขออภัย ไฟล์ที่ท่านเลือกไม่ได้รับอนุญาตให้อัพโหลดค่ะ ค่ะ'
            ];
        }
        if($_FILES['userfile']['size'] > 10485760) // 10 mb
        {
            return [
                'status' => 500,
                'message'=>'ขออภัย อนุญาตให้ Upload ไฟล์ได้สูงสุด 10MB ค่ะ'
            ];
        }

        $dir_temp = 'uploads/';
        $filename = uniqid() . '_' . time() . '.' . $extension;
        $request->file('userfile')->move($dir_temp, $filename);
        return [
            'status' => 200,
            'url' => '/' . $dir_temp . $filename
        ];
    }
}