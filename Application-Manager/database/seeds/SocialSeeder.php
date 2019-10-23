<?php

use Illuminate\Database\Seeder;

class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $socials = [
            ["Instagram", 'https://www.instagram.com'],
            ['Facebook', "https://www.facebook.com"],
            ["LinkedIn", 'https://www.linkedin.com'],
        ];

        foreach ($socials as $social) {

            $_social = new App\Models\Social;
            $_social->name = $social[0];
            $_social->url = $social[1];
            $_social->save();
        }
    }
}
