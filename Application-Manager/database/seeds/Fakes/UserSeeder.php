<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [

            ["admin", "admin", "admin@admin.com", Hash::make('admin'), 'ADM', NULL],
            ["Martin", "Gauthier", "headscout1@headscout.com", Hash::make('headscout1'), 'HEA', NULL],
            ["Yan", "Bono", "headscout2@headscout.com", Hash::make('headscout2'), 'HEA', NULL],
            ["Justin", "Langlois", "scout1@scout.com", Hash::make('scout1'), 'SCO', 2],
            ["Marc", "Langlois", "scout2@scout.com", Hash::make('scout2'), 'SCO', 2],
            ["Marie", "Saint-Clair", "scout3@scout.com", Hash::make('scout3'), 'SCO', 3],
            ["Sabrina", "Leblanc", "scout4@scout.com", Hash::make('scout4'), 'SCO', 3],

        ];

        foreach($users as $seed) {

            $user = new App\Models\User;

            $user->firstname = $seed[0];
            $user->lastname = $seed[1];
            $user->email = $seed[2];
            $user->password = $seed[3];
            $user->save();

            $array = ["lead_id" => $seed[5]];
            $user->roles()->attach($seed[4], $array);
        }
    }
}
