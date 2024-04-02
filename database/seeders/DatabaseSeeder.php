<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Listing;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $user =  User::factory()->create([
        'name' => 'Ahsanul Hasib',
        'email' => 'ahsanulhasib2@gmail.com'
       ]);
       
        Listing::factory(4)->create([
            'user_id' => $user->id
        ]);

        
    }
}
