<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([

            //Web app seeds
            StepSeeder::class,
            SourceSeeder::class,
            OfficeSeeder::class,
            QuestionSeeder::class,
            CountrySeeder::class,
            RoleSeeder::class,
            SocialSeeder::class,

            //Fake generated seeds for developement
            UserSeeder::class,
            ContactAndApplicationSeeder::class,
        ]);
    }
}