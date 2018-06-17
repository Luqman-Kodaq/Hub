<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'site_name' => "Content Hub",
            'address' => "Nigeria, Lagos",
            'contact_us' => "09066432526",
            'contact_email' => "onakoyak@gmail.com",
            'about_us' => "Content hub was established 2018, as a solution to the ill manifest of manipulating contents that is wide-spread on the internet in the modern world",
            'our_services' => "Content hub is a web-based content management system that handles sophisticated premium contents on different varying essential part of human existence.",
        ]);
    }
}
