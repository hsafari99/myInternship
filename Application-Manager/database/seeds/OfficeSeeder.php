<?php

use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offices = [
            'MTL' => 'Montreal',
            'TOR' => 'Toronto',
        ];

        $len = sizeof($offices);
        $keys = array_keys($offices);

        for ($i = 0; $i < $len; $i++) {

            $office = new App\Models\Office;
            $office->id = $keys[$i];
            $office->en = $offices[$keys[$i]];
            $office->save();
        }
    }
}
