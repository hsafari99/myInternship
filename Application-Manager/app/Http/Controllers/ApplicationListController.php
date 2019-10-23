<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationListController extends Controller
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
     * Show the whole list of applications.
     * The list is shown in chunks and paginated.
     * From recent to older.
     * 
     * @return Renderable
     */
    public function index()
    {
        // TODO : Get all the applications in DESC order.

        return view('applicationList');
    }
}
