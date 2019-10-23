<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Contact;
use App\Models\Application;
use App\Models\User;
use App\Models\Question;
use App\Models\Social;
use App\Models\Network;
use App\Models\Measurement;
use App\Models\Citizenship;
use App\Models\WorkPermit;

class ContactAndApplicationSeeder extends Seeder
{
    /**
     * Faker instance.
     * 
     * @var Faker
     */
    private $faker;
    
    /**
     * Scouts
     * 
     * @var int
     */
    private $justin, $marie;

    /**
     * Questions
     * 
     * @var Question
     */
    private $questions;

    /**
     * Social
     * 
     * @var Social
     */
    private $socials;

    /**
     * Initiate attributes.
     * 
     * @return void
     */
    public function __construct()
    {
        // init faker
        $this->faker = Faker::create();

        // init scouts
        $user = User::where('firstname', 'Justin')->first();
        $this->justin = $user->id;
        $user = User::where('firstname', 'Marie')->first();
        $this->marie = $user->id;

        // init questions
        $this->questions = Question::all();

        //init socials
        $this->socials = Social::all();
    }

    /**
     * Run the database seeds.
     * Seed some fake applications at each possible steps.
     * 
     * @return void
     */
    public function run()
    {
        /* -------------------------------- */
        /* TEM
        /* -------------------------------- */
        $quantity = 5;
        for ($i = 0; $i < $quantity; $i++) {
            
            $contact = new Contact;
            $this->assignGender($contact);
            $contact->save();
            
            $app = $this->createApp($contact, "TEM");
            $app->save();
        }

        /* -------------------------------- */
        /* DEL
        /* -------------------------------- */
        $quantity = 5;
        for ($i = 0; $i < $quantity; $i++) {
            
            $contact = new Contact;
            $this->assignGender($contact);
            $contact->save();
            
            $app = $this->createApp($contact, "DEL");
            $app->save();
        }

        /* -------------------------------- */
        /* SCT
        /* -------------------------------- */
        $quantity = 5;
        for ($i = 0; $i < $quantity; $i++) {
            
            $contact = new Contact;
            $this->assignGender($contact);
            $this->someInfoContact($contact);
            $this->assignNetwork($contact);
            $contact->save();
            
            $app = $this->createApp($contact, "SCT");
            $app->save();
        }

        /* -------------------------------- */
        /* APR
        /* -------------------------------- */
        $quantity = 5;
        for ($i = 0; $i < $quantity; $i++) {
            
            $contact = new Contact;
            $this->assignGender($contact);
            $this->someInfoContact($contact);
            $this->assignNetwork($contact);
            $contact->save();
            
            $app = $this->createApp($contact, "APR");
            $app->save();
        }

        /* -------------------------------- */
        /* DIS
        /* -------------------------------- */
        $quantity = 5;
        for ($i = 0; $i < $quantity; $i++) {
            
            $contact = new Contact;
            $this->assignGender($contact);
            $this->someInfoContact($contact);
            $this->assignNetwork($contact);
            $contact->save();
            
            $app = $this->createApp($contact, "DIS");
            $app->save();
        }

        /* -------------------------------- */
        /* NIN
        /* -------------------------------- */
        $quantity = 5;
        for ($i = 0; $i < $quantity; $i++) {
            
            $contact = new Contact;
            $this->assignGender($contact);
            $this->someInfoContact($contact);
            $this->assignNetwork($contact);
            $contact->save();
            
            $app = $this->createApp($contact, "NIN");
            $app->save();
        }

        /* -------------------------------- */
        /* INV
        /* -------------------------------- */
        $quantity = 5;
        for ($i = 0; $i < $quantity; $i++) {
            
            $contact = new Contact;
            $this->assignGender($contact);
            $this->someInfoContact($contact);
            $this->assignNetwork($contact);
            $contact->save();
            
            $app = $this->createApp($contact, "INV");
            $app->save();
        }

        /* -------------------------------- */
        /* PRE
        /* -------------------------------- */
        $quantity = 5;
        for ($i = 0; $i < $quantity; $i++) {
            
            $contact = new Contact;
            $this->assignGender($contact);
            $this->someInfoContact($contact);
            $this->completeInfoContact($contact);
            $this->assignNetwork($contact);
            $contact->save();
            
            $app = $this->createApp($contact, "PRE");
            $this->answerQuestions($app);
            $this->addCitizenshipsAndPermits($app);
            $app->save();
        }

        /* -------------------------------- */
        /* VOT
        /* -------------------------------- */
        $quantity = 5;
        for ($i = 0; $i < $quantity; $i++) {
            
            $contact = new Contact;
            $this->assignGender($contact);
            $this->someInfoContact($contact);
            $this->completeInfoContact($contact);
            $this->assignNetwork($contact);
            $contact->save();
            
            $app = $this->createApp($contact, "VOT");
            $this->answerQuestions($app);
            $this->addCitizenshipsAndPermits($app);
            $this->addMeasurements($app);
            $app->save();
        }
    }

    // ===========================================================================
    // ============================== HELPER FUNCTIONS ===========================
    // ===========================================================================
    
    /**
     * Assign gender info to a contact.
     * 
     * @param Contact $contact
     * @return void
     */
    public function assignGender(Contact $contact)
    {
        // Determine the gender.
        $genderLetter = $this->faker->randomElement(['m', 'f']);
        ($genderLetter == 'm') ? ($gender = 'male') : ($gender = 'female');
        
        // Assign the info.
        $contact->gender = $gender;
        $contact->firstname = $this->faker->firstname($gender);
        $contact->lastname = $this->faker->lastname;

        $contact->save();
    }

    /**
     * Assign a scout to an application.
     * 
     * @param Application $application
     * @return void
     */
    public function assignScout(Application $application)
    {
        // Determine scout.
        $scout_id = $this->faker->randomElement([$this->justin, $this->marie]);
        
        // Assign scout.
        $application->user_id = $scout_id;
        $application->source_id = "SCT";
    }

    /**
     * Assign networks to a contact.
     * 
     * @param Contact $contact
     * @return void
     */
    public function assignNetwork(Contact $contact)
    {
        foreach ($this->socials as $social) {
            $network = new Network;
            $network->contact_id = $contact->id;
            $network->social_id = $social->id;
            $network->username = $this->faker->username();
            $network->save();
        }
    }

    /**
     * Answer questions and bind them to an application.
     * 
     * @param Application $application
     * @return void
     */
    public function answerQuestions(Application $application)
    {
        foreach ($this->questions as $question) {
            $array = ["answer" => $this->faker->text(200)];
            $application->questions()->attach($question, $array);
        }
    }

    /**
     * Add measurements to an application.
     * 
     * @param Application $application
     * @return void
     */
    public function addMeasurements(Application $application)
    {
        $measurement = new Measurement();
        $measurement->application_id = $application->id;

        $height1 = $this->faker->numberBetween(5, 6);
        $height2 = $this->faker->numberBetween(1, 11);
        $height = $height1.".".$height2;

        $measurement->height = $height;
        $measurement->waist = $this->faker->randomFloat(1, 25, 30);
        $measurement->bust = $this->faker->randomElement(['34.B', '32.C', '33.D']);
        $measurement->hips = $this->faker->randomFloat(1, 36, 39);
        $measurement->neck = $this->faker->randomFloat(1, 15, 17);
        $measurement->jacket = $this->faker->randomFloat(1, 34, 37);
        $measurement->sleeve = $this->faker->randomFloat(1, 32, 34);
        $measurement->dress = $this->faker->numberBetween(2, 8);
        $measurement->shoe = $this->faker->numberBetween(7, 10);
        $measurement->inseam = $this->faker->randomFloat(1, 30, 34);
        $measurement->eye_color = $this->faker->randomElement(['Blue', 'Brown']);
        $measurement->hair_color = $this->faker->randomElement(['Blonde', 'Black']);
        $measurement->office_id = $this->faker->randomElement(['MTL', 'TOR']);
        $measurement->save();
    }

    /**
     * Add votes to an application.
     * 
     * @param Application $application
     * @return void
     */
    public function addVotes(Application $application)
    {

    }

    /**
     * Add citizenships and work permits to an application.
     * 
     * @param Application $application
     * @return void
     */
    public function addCitizenshipsAndPermits(Application $application)
    {
        $citizenship = new Citizenship;
        $citizenship->application_id = $application->id;
        $citizenship->country_id = "CAN";
        $citizenship->save();

        $workpermit = new WorkPermit;
        $workpermit->application_id = $application->id;
        $workpermit->country_id = "CAN";
        $workpermit->save();
    }

    /**
     * Create an application for a contact.
     * NOTE : In this seeder, all applications come from a scout.
     * 
     * @param Contact $contact
     * @param string $step_id
     * @return Application
     */
    public function createApp(Contact $contact, $step_id)
    {
        $application = new Application;
        $application->contact_id = $contact->id;
        $this->assignScout($application);
        $application->step_id = $step_id;
        $application->save();

        return $application;
    }

    /**
     * Set some "scout" info to the contact.
     * 
     * @param Contact $contact
     * @return void
     */
    public function someInfoContact(Contact $contact)
    {
        $firstname = strtolower($contact->firstname);
        $lastname = strtolower($contact->lastname);
        $contact->email = $firstname.".".$lastname."@".$this->faker->safeEmailDomain;
        $contact->phone = $this->faker->tollFreePhoneNumber;
    }

    /**
     * Set all the info to the contact
     * 
     * @param Contact $contact
     * @return void
     */
    public function completeInfoContact(Contact $contact)
    {
        $contact->address = $this->faker->streetAddress;
        $contact->city = $this->faker->city;
        $contact->postcode = $this->faker->postcode;
        $contact->country_id = $this->faker->randomElement(["USA", "CAN"]);
        $contact->birthdate = $this->faker->date($format = 'Y-m-d', $max = '2002-02-02');
    }
}
