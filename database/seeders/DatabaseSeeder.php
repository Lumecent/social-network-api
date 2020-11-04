<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
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
             ['name' => 'vk', 'regex' => '(https{0,1}:\/\/)?(www\.)?(vk.com\/)(id\d|[a-zA-z][a-zA-Z0-9_.]{2,})'],
             ['name' => 'fb', 'regex' => '(https{0,1}:\/\/)?(www\.)?(facebook.com\/)([a-zA-z][a-zA-Z0-9_.]{2,})'],
             ['name' => 'ok', 'regex' => '(https{0,1}:\/\/)?(www\.)?(ok.ru\/)([a-zA-z][a-zA-Z0-9_.]{2,})'],
             ['name' => 'twit', 'regex' => '(https{0,1}:\/\/)?(www\.)?(twitter.com\/)([a-zA-z][a-zA-Z0-9_.]{2,})'],
             ['name' => 'inst', 'regex' => '(https{0,1}:\/\/)?(www\.)?(instagram.com\/)([a-zA-z][a-zA-Z0-9_.]{2,})'],
             ['name' => 'site', 'regex' => '(http:\/\/|https:\/\/)?([^\.\/]+\.)*([a-zA-Z0-9])([a-zA-Z0-9-]*)\.([a-zA-Z]{2,6})(\/.*)']
         ];

         foreach ($social as $s){
             Social::factory(1)->create($s);
         }

         $blogCategory = [
             ['name' => 'Личное'],
             ['name' => 'Общее'],
             ['name' => 'Самопиар'],
             ['name' => 'Услуги'],
             ['name' => 'Статьи'],
             ['name' => 'Опросы'],
             ['name' => 'Конкурсы']
         ];

        foreach ($blogCategory as $s){
            BlogCategory::factory(1)->create($s);
        }
    }
}
