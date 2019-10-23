<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            
            "ADM" => 'admin',
            "SCO" => 'scout',
            "HEA" => 'headscout',
            "VTR" => 'voter',
            "ITR" => 'inviter',
            "AST" => 'assistant',
            'COR' => "contractor",
        ];

        $len = sizeof($roles);
        $keys = array_keys($roles);

        for ($i = 0; $i < $len; $i++) {

            $role = new App\Models\Role;
            $role->id = $keys[$i];
            $role->name = $roles[$keys[$i]];
            $role->save();
        }
    }
}
