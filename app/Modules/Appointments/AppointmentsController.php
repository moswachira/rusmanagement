<?php
namespace App\Modules\Appointments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use DB;
use stdClass;
use App\Services\MyResponse;
class AppointmentsController extends Controller
{
        public function index()
    {
        $appointments = Appointment::all();
        return view('admin.appointments.index', compact('appointments'));
    }
}