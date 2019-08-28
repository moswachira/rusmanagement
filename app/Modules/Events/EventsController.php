<?php
namespace App\Modules\Events;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Services\MyResponse;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
class EventsController extends Controller
{
    public function createEvent()
    {
        return view('eve::createevent');
    }
    public function store(Request $request)
    {
        $title = $request->get('title');
        $start_date = $request->get('start_date');
        $end_date = $request->get('end_date');
        

        if(!empty($title) && !empty($start_date) && !empty($end_date))
        {
                DB::table('calendar')->insert([
                    'title' =>$title,
                    'start_date' =>$start_date,
                    'end_date' =>$end_date,
                    'created_at' =>date('Y-m-d H:i:s'),
                ]);
        }
    }
    public function calender()
            {
                ini_set("memory_limit","1024M");
                $events = [];
                $data = DB::table('calendar')->get();
                    foreach ($data as $key => $value) 
                    {
                        $events[] = Calendar::event(
                            $value->title,
                            true,
                            date('Y-m-d',strtotime($value->start_date)),
                            date('Y-m-d',strtotime($value->end_date.'+1 day')),
                            null,
                            // Add color
                         [
                             'color' => '#000000',
                             'textColor' => '#008000',
                         ]
                        );
                    }
                $calendar = Calendar::addEvents($events);
                return view('eve::calender', compact('calendar'));
            }
}