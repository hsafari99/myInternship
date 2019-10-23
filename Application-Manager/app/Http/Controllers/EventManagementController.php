<?php

namespace App\Http\Controllers;

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
}
