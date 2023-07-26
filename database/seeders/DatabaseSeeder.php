<?php

namespace Database\Seeders;

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
        \App\Models\User::factory(10)->create();
        \App\Models\Listing::factory(5)->create();
        // \App\Models\Listing::create([
            
        //     'title'=>'Full-Stack developer',
        //     'tags'=>'Javascript,Php',
        //     'company'=>'NCH',
        //     'location'=>'Rabat',
        //     'email'=>'test@test.com',
        //     'website'=>'local.com',
        //     'description'=>'we need an experienced full-stack developer to help us building a new web app'
        // ]);
        // \App\Models\Listing::create([
            
        //     'title'=>'Mobile developer',
        //     'tags'=>'Java,Flutter',
        //     'company'=>'Soft',
        //     'location'=>'Casablanca',
        //     'email'=>'test@test.com',
        //     'website'=>'soft.com',
        //     'description'=>'we need a Mobile developer to help us building a new app'
        // ]);
    }
}
