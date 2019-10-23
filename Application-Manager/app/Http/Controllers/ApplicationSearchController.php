<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationSearchController extends Controller
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
     * Show the search page.
     * 
     * @return Renderable
     */
    public function index()
    {
        return view('applicationSearch');
    }
}
