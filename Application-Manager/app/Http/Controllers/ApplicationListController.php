<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Application as Application;

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

    public function getApplications(Request $request){
        $howMany = $request->input('qty');
        $from = $request->input('from');

        $contacts = [];
        // $result = DB::table('applications')->get();
        $result = DB::table('applications')->orderBy('id')->get()->skip((($from*$howMany-1) < 0) ? 0 : ($from*$howMany-1))->take($howMany);

        foreach ($result as $application) {
            $medias = null;
            $firstname = (DB::table('contacts')
                                ->where('id', $application->contact_id)
                                ->value('firstname')) 
                                    ?: 
                                    'N/A';
            $lastname  = (DB::table('contacts')
                                ->where('id', $application->contact_id)
                                ->value('lastname'))  
                                    ?: 
                                    'N/A';
            $age       = (DB::table('contacts')
                                ->where('id', $application->contact_id)
                                ->value('birthdate')) ? 
                                    intval(date('Y')) - intval(date('Y', strtotime(DB::table('contacts')
                                            ->where('id', $application->contact_id)
                                            ->value('birthdate'))))
                                                : 'N/A';
            $height     = (DB::table('measurements')
                                ->where('application_id', $application->id)
                                ->value('height')) 
                                    ?: 
                                    'N/A'; 
            $applied    = (DB::table('applications')
                                ->where('id', $application->id)
                                ->value('created_at')) ? 
                                    date('Y' , strtotime(DB::table('applications')
                                            ->where('id', $application->id)
                                            ->value('created_at')))
                                                        : 'N/A';
            $office     = (DB::table('measurements')
                                ->where('application_id', $application->id)
                                ->value('office_id')) ?
                                    DB::table('offices')
                                        ->where('id', DB::table('measurements')
                                                            ->where('application_id', $application->id)
                                                            ->value('office_id'))
                                                            ->value('en')
                                                        : 
                                                        'N/A'; 
            $city       =   (DB::table('contacts')
                                    ->where('id', $application->contact_id)
                                    ->value('city')) ? : 'N/A';
            $country    =   (DB::table('contacts')
                                    ->where('id', $application->contact_id)
                                    ->value('country_id')) ?
                                        (DB::table('countries')
                                                ->where('id', DB::table('contacts')
                                                                    ->where('id', $application->contact_id)
                                                                    ->value('country_id'))
                                                                        ->value('en')) : 'N/A';
            $residence  = $city.' , '.$country;
            $votes      = 'N/A';
            $medias   = DB::table('networks')->join('socials', 'networks.social_id', '=', 'socials.id')->select('socials.name', 'networks.username')->where('contact_id', $application->contact_id)->get();

            $contact = [
                'firstname' => $firstname,                  
                'lastname'  => $lastname,  
                'age'       => $age,  
                'height'    => $height, 
                'applied'   => $applied, 
                'office'    => $office,  
                'residence' => $residence,  
                'votes'     => $votes,  
                'medias'    => $medias,  
            ];

            $contacts[] = $contact;
        }
        $jsonResult = Json_encode($contacts);

        echo ($jsonResult);
    }


    public function totalResults(Request $request){
        $total = DB::table('applications')->count();

        $jsonResult = Json_encode($total);

        echo ($jsonResult);
    }
}
