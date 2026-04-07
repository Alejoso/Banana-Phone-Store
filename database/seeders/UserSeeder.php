<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'alejotiradoramirez@gmail.com',
            'password' => Hash::make('123'),
            'national_id' => '1001234567',
            'first_name' => 'Carlos',
            'last_name' => 'Ramírez',
            'role' => 'Admin',
            'phone_number' => '3001234567',
            'birthday' => '1990-05-15',
            'address' => 'Calle 50 #30-20, Medellín',
        ]);

        User::create([
            'name' => 'cliente Uno',
            'email' => 'empanadaspor1000@gmail.com',
            'password' => Hash::make('123'),
            'national_id' => '1009876543',
            'first_name' => 'Andrés',
            'last_name' => 'López',
            'role' => 'Cliente',
            'phone_number' => '3109876543',
            'birthday' => '1995-08-22',
            'address' => 'Carrera 70 #45-10, Medellín',
        ]);
    }
}
