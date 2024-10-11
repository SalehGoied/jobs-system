<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),  // Encrypt the password
            'role' => 'admin',  // Set role as 'admin'
            'name_ar' => 'مدير',
            'name_en' => 'Admin',
            'job_title' => 'System Administrator',  // Example for job title
            'phone_number' => '123456789',  // Example for phone number
        ]);
    }
}
