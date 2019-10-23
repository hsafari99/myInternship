<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewApplicationController extends Controller
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
     * Show the page that lets a scout register a new application.
     * 
     * @return Renderable
     */
    public function index()
    {
        return view('newApplication');
    }

    public function add(Request $request){
        dd($request);
    }
}
