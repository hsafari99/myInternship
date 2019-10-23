<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ApplicationProfileController extends Controller
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
     * Show an application profile.
     * 
     * @param int $application_id
     * @return Renderable
     */
    public function index($id)
    {
        return view('applicationProfile', [
            'id' => $id,
            ]);
    }

    /**
     * Retrieve the application data of a specific application Id
     * and pass it to the blade using Ajax call.
     * (HINT) => The controller is not complete. I just put the sample result type that I need in frontline for your info.
     * @param int $application_id
     * @return result
     */
    public function getInfoById(Request $request){
        $id = $request->input('id');

        $output = array(
            'fName'=> 'Iman',
            'lName'=> 'Ayorinde',
            'scouteOffice'=> 'Toronto',
            'scoutedBy'=> 'Kelly Lee',
            'personalInfo'=> [
                'gender' => 'male',
                'age' => 19,
                'dob' => '1999-10-26',
                'citizenships' =>[
                    'Canada', 'United States'
                ],
                'can_work_in_ca' => true,
                'talents' => [
                    'Acting', 'Basketball','Rugby'
                ],
            ],
            'contactInfo'=> [
                'address' => '370 Polar Dr.',
                'city' => 'Oakville',
                'province' => 'Ontario',
                'country' => 'Canada',
                'postal' => 'L6J4E4',
                'phone' => '9055997518',
                'email' => 'IMANAYORINDE@GMAIL.COM',
                'networks' =>[
                    [
                        'network'=> 'instagram',
                        'id'=> 'IMANAYORINDE',
                        'followers'=> 1377,
                    ],
                    [
                        'network'=> 'facebook',
                        'id'=> 'myFacebook',
                        'followers'=> 2001,
                    ],
                ],
            ],
            'measurements' => [
                'height'=> 6.0,
                'hips'=> 'N/A',
                'waist'=> 31,
                'shoe'=> 12,
                'inseam'=> 32,
                'hair'=> 'Brown',
                'eyes'=> 'Brown',
                'neck'=> 16,
                'jacket'=> 39,
                'sleeve'=> 32,
                'bust'=> 'N/A',
                'dress'=> 'N/A',
            ],
            'questions'=>[
                'YOUR SECRET TO LOOK LIKE A MODEL IS...?',
                'BEAUTY PRODUCT YOU CAN\'T LIVE WITHOUT IS...?',
                'THREE WORDS THAT BEST DESCRIBE YOUR STYLE?',
                'THE FEATURE YOU GET THE MOST COMPLIMENTS ON IS...?',
                'WHO IS YOUR STYLE ICON?',
                'WHO IS YOUR CELEBRITY CRUSH?',
                'ANY TATTOOS?' ,
                'ANY PIERCINGS?',
                'ANY SCARS?',
                'ANY ALLERGIES?',
                'ARE YOU VEGETARIAN?',
                'INTERVIEWED BY ANOTHER AGENCY?',
                'PREVIOUS MODELLING AND/OR ACTING EXPERIENCE?',
                'WHERE DO YOU COME FROM?',
                'WHAT IS YOUR FAVOURITE SPORT OR ACTIVITY?',
                'WHAT IS THE TOP 3 ON YOUR \"BUCKET LIST\"?',
                'THE BEST PIECE OF ADVICE SOMEONE EVER GAVE YOU?',
                'TEN YEARS FROM NOW, I HOPE TO...?',
                'WHEN NO ONE IS AROUND I TEND TO...?',
                'WHAT IS YOUR HIDDEN TALENT?',
                'IF YOU COULD BUY ONE THING RIGHT NOW IT WOULD BE...?',
                'PHOTOGRAPHER YOU WOULD LIKE TO SHOOT WITH?',
                'LAST PICTURE YOU TOOK WITH YOUR PHONE?',
                'NOTES',
            ],
            'answers' =>[
                'CLEAR SKIN',
                'DOES DEODARANT COUNT AS A BEAUTY PRODUCT?',
                'SIMPLE, EASY, ELEGANT',
                'MY CHEEKS',
                'I DON’T THINK I HAVE ONE AT THE MOMENT',
                'KRISTEN BELL',
                '',
                '',
                '',
                'LACTOSE INTOLERANCE',
                '',
                'ELMER OLSEN MODEL AND TALENT FOR MODELLING AND IBI',
                'YES',
                'OAKVILLE ONTARIO',
                'BASKETBALL',
                'SERIES REGULAR, SUPPORTING IN A FEATURE FILM, LEAD IN A FEATURE FILM',
                'LIFE IS LIKE A WAVE, SOMETIMES YOU ARE WAITING FOR THAT BIG WAVE RO COME ONLY FOR YOU TO GET UP AND FALL AGAIN, WAITING FOR ANOTHER WAVE. ONE DAY YOU WILL MANAGE TO FIND SNITHER BIG WAVE AND YOU WILL BE ABLE TO GET UP AND GO. IN LIFE WE HAVE MANY OPPROTUNITIES THAT COME AND GO BUT YOU JUST HAVE TO KEEP ON BELIEVING THAT ANOTHER OPPORTUNITY IS ON IT’S WAY!',
                'BE LIVING IN LOS ANGELES!',
                'THINK ABOUT WHAT MY NEXT STEP IS TO ACHIEVING MY GOALS',
                'BACKFLIPS! (TRAMPOLINE THOUGH HAHA)',
                'A HALLOWEEN COSTUME',
                'SAM JONES',
                'A PICTURE OF MY HOUSEMATE',
                '',         
            ], 
            'paths'=> [
                'faceShot' => Storage::disk('public')->exists('./4/ayorinde4_faceShot.jpg')   ? Storage::url('/4/ayorinde4_faceShot.jpg')   : null,
                'profile'  => Storage::disk('public')->exists('./4/ayorinde4_profile.jpg')    ? Storage::url('/4/ayorinde4_profile.jpg')    : null,
                'waistUp'  => Storage::disk('public')->exists('./4/ayorinde4_waistUp.jpg')    ? Storage::url('/4/ayorinde4_waistUp.jpg')    : null,
                'headToToe'=> Storage::disk('public')->exists('./4/ayorinde4_headToToes.jpg') ? Storage::url('/4/ayorinde4_headToToes.jpg') : null,
                'others0'  => Storage::disk('public')->exists('./4/ayorinde4_other0.jpg')     ? Storage::url('/4/ayorinde4_other0.jpg')     : null, 
                'others1'  => Storage::disk('public')->exists('./4/ayorinde4_other1.jpg')     ? Storage::url('/4/ayorinde4_other1.jpg')     : null, 
                'others2'  => Storage::disk('public')->exists('./4/ayorinde4_other2.jpg')     ? Storage::url('/4/ayorinde4_other2.jpg')     : null, 
                'others3'  => Storage::disk('public')->exists('./4/ayorinde4_other3.jpg')     ? Storage::url('/4/ayorinde4_other3.jpg')     : null,
            ]
        );

        $result = json_encode($output);
        echo $result;

    }
}
