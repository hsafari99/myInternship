<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EventManagementController extends Controller
{
    /**
     * Create a new controller instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the page used for managing events.
     * 
     * @return Renderable
     */
    public function index()
    {
        return view('eventManagement');
    }

    public function add()
    {
        return view('eventCreation');
    }

    public function recordEvent(Request $request)
    {
        $name = $request->input('name');
        $desc = $request->input('description');
        // $from = $request->input('from');
        //  $to = $request->input('to');
        //  $notes = $request->input('notes');

        $eventID = DB::table('events')->insertGetId([
                                                        'name' => $name,
                                                        'desc' => $desc,
                                                        // 'from' => $from,
                                                        // 'to'   => $to,
                                                        // 'notes'   => $notes,
                                                        'created_at' => now(),
                                                        'updated_at' => now(),
                                                    ]);

        if($request->file('eventImg')){                                                
        $extension = $request->file('eventImg')->extension();
        $imageName = 'thumbnail.'.$extension;
        $image = $request->file('eventImg')->storeAs('/public/'.$eventID, $imageName);
        }
        return view('eventManagement');
    }

    public function getAllEvents(Request $request){
        sleep(5);
        $events= [];
        $events = DB::table('events')->get();

        $result = json_encode($events, true);

        echo($result);
    }
    
}
