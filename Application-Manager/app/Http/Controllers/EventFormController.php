<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventFormController extends Controller
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
     * Show the form tailored for a particular event.
     * 
     * @param int $event_id
     * 
     * @return Renderable
     */
    public function index($id)
    {
        return view('eventForm');
    }
}
