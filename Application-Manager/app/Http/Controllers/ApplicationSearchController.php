<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Step;

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

// This function get the criteria user entered (about applicant) and retrieve the applications matches with given criterias
    public function getApplicationByApplicantInfo(Request $request){
        echo "This function will show the application by giving the applicant information";
        dd($request);
    }

// This function get the criteria user entered (about application status) and retrieve the applications matches with given criterias
    public function getApplicationByStatus(Request $request){
        echo "This function will show the application by giving the application status";
        dd($request);
    }

// This function get the criteria user entered (about event status the application related to) and retrieve the applications matches with given criterias
    public function getApplicationByEvent(Request $request){
        echo "This function will show the application by giving the relevant event";
        dd($request);
    }

// This function get the criteria user entered (about applicant) and retrieve the applications matches with given criterias
    public function getEventStatusList(Request $request){
        // must be soft coded and retrieved from database

        $steps = Step::all();

        $_steps = [];
        foreach ($steps as $step) {
            $_steps[$step->id] = $step->en;
        }
 
        $jsonResult = json_encode($_steps);

        echo ($jsonResult);
    }
}
