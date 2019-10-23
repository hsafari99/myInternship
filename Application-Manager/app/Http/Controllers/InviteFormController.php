<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class InviteFormController extends Controller
{
    /**
     * Create a new controller instance.
     * 
     * @return void
     */
    public function __construct()
    {
        // TODO : Control the accessibility of the link.
    }

    /**
     * Show the invite form.
     * 
     * @return Renderable
     */
    public function index($id, $lang)
    {
        App::setLocale($lang);
        return view('inviteForm', compact("lang"));
    }
}
