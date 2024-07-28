<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $user= User::factory()->create([
        //     'name'=>'Pratham Srivastava',
        //     'email'=>'Pratham@gmail.com'
        // ]);
        // // User::factory(10)->create();
        // Listing::factory(5)->create([
        //     'user_id'=>$user->id
        // ]);
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        User::factory(5)->create()->each(function ($user) {
            // Create five listings for each user
            Listing::factory(5)->create([
                'user_id' => $user->id
            ]);
        });
    }
}
