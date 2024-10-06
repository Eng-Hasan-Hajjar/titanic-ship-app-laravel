<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        //php artisan migrate:fresh
        //php artisan db:seed --class=CategoriesSeeder
        //php artisan db:seed
        \App\Models\User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password'=>'123456789',
            'role'=>'admin',
          ]);
          \App\Models\User::create([
              'name' => 'Test User 2',
              'email' => 'test2@example.com',
              'password'=>'123456789',
              'role'=>'employee',
            ]);
            \App\Models\User::create([
              'name' => 'Test User 3',
              'email' => 'test3@example.com',
              'password'=>'123456789',
              'role'=>'customer',
            ]);




        $this->call([

            ProductsSeeder::class,

        ]);
        $this->call([

            FacebookPagesSeeder::class,

        ]);
        $this->call([

            YouTubeChannelsSeeder::class,

        ]);
        $this->call([

            InstagramAccountsSeeder::class,

        ]);
        $this->call([

            RecommendationsSeeder::class,
        ]);




    }
}
