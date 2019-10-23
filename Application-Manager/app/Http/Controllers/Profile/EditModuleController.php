<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;

class EditModuleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:scout');
    }
}
