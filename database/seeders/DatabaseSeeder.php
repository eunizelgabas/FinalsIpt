<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'remember_token' => Str::random(10), // Generating a random token
            'email_verified_at' => now(),
            'password' => Hash::make('password123'), // Correcting the bcrypt function
        ]);

      $pat =  User::factory()->create([
            'name' => 'Test Patient',
            'email' => 'patient@example.com',
            'remember_token' => Str::random(10), // Generating a random token
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
        ]);

        Patient::factory()->create([
            'user_id' => $pat->id,
            'gender' => 'Female',
            'address' => 'Sagbayan, Bohol',
        ]);


        $this->call([
            RolesSeeder::class,
            // UserSeeder::class
        ]);
    }

}
