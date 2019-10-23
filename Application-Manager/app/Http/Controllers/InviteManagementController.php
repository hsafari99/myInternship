<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InviteManagementController extends Controller
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
     * Show the page for managing invites.
     * 
     * @return Renderable
     */
    public function index()
    {
        return view('inviteManagement');
    }
}
