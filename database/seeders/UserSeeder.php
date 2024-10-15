<?php

namespace Database\Seeders;

use App\Models\Profile;
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
        $admin = User::create([
            "name" => "Admin",
            "email" => "admin@example.com",
            "password" => Hash::make("password")
        ]);
        $admin->assignRole('admin');
        Profile::create([
            'phone' => '1234567890',
            'age' => 30, 
            'address' => 'Indonesia, Sulawesi Selatan, Makassar',
            'user_id' => $admin->id
        ]);

        
        $user = User::create([
            "name" => "Jouxing Ngo",
            "email" => "jouxing@example.com",
            "password" => Hash::make("password")
        ]);
        $user->assignRole('user');
        Profile::create([
            'phone' => '1234567890',
            'age' => 30, 
            'address' => 'Indonesia, Sulawesi Tengah, Palu',
            'user_id' => $user->id
        ]);
    }
}
