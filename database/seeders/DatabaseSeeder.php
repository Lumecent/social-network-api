<?php

namespace Database\Seeders;

use App\Models\Social;
use App\Models\User;
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
         User::factory(10)->create();

         $social = [
             ['name' => 'vk'],
             ['name' => 'fb'],
             ['name' => 'ok'],
             ['name' => 'twit'],
             ['name' => 'inst'],
             ['name' => 'site']
         ];

         foreach ($social as $s){
             Social::factory(1)->create($s);
         }
    }
}
