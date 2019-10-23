<?php

use Illuminate\Database\Seeder;

class StepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $steps = [

            'APP' => 'Applying By Themself',
            'SCT' => 'Scouted',
            'TEM' => 'Temporary',
            'DEL' => 'Deleted',
            'DIS' => 'Disapproved',
            'APR' => 'Approved',
            'INV' => 'Invited',
            'SCH' => 'Scheduled',
            'PRE' => 'Ready for measurement',
            'MIA' => 'Did Not Attend',
            'NIN' => 'Not Invited',
            'VOT' => 'Waiting For Votes',
            'VOX' => 'Votes Closed',
            'RIV' => 'Re-invited',
            'WAN' => 'Wanted',
            'NOC' => 'Did Not Sign The Contract',
            'REF' => 'Refused',
            'CON' => 'Contracted',
            'UNC' => 'Uncontracted',
        ];

        $len = sizeof($steps);
        $keys = array_keys($steps);

        for ($i = 0; $i < $len; $i++) {

            $step = new App\Models\Step;
            $step->id = $keys[$i];
            $step->en = $steps[$keys[$i]];
            $step->save();
        }
    }
}
