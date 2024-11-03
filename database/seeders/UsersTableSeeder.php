<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Disable foreign key checks
       DB::statement('SET FOREIGN_KEY_CHECKS=0;');

       // Clear the existing records
       User::truncate();

       // Enable foreign key checks
       DB::statement('SET FOREIGN_KEY_CHECKS=1;');

       // Insert user if not exists
       $user = User::where('email', 'katifraniz@gmail.com')->first();

       if (!$user) {
        User::firstOrCreate(
            ['email' => 'katifraniz@gmail.com'],  // Match on the email
            [
                'name' => 'Kati Franiz',
                'role' => 'admin',
                'password' => Hash::make('Kati123456')
            ]
        );
       }
    }
}
