<?php

use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sources_en = [

            'WEB' => 'Online Search.',
            'EVT' => 'At an event.',
            'RAD' => 'On the radio.',
            'SCT' => 'I was scouted.',
            'POS' => 'On posters.',
            'WOM' => 'By word of mouth.',
            'NEW' => 'In the newspapers.',
            'SOC' => 'On social media.',
        ];

        $sources_fr = [

            'WEB' => 'Recherche en Ligne.',
            'EVT' => 'Dans un événement.',
            'RAD' => 'À la radio.',
            'SCT' => 'Un scout m\'a repéré.',
            'POS' => 'Sur une affiche.',
            'WOM' => 'Par le bouche à oreille.',
            'NEW' => 'Dans les journeaux.',
            'SOC' => 'Dans les média sociaux.',
        ];

        $len = sizeof($sources_en);
        $keys = array_keys($sources_en);

        for ($i = 0; $i < $len; $i++) {

            $source = new App\Models\Source;
            $source->id = $keys[$i];
            $source->en = $sources_en[$keys[$i]];
            $source->fr = $sources_fr[$keys[$i]];
            $source->save();
        }
    }
}
