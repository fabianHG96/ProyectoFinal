<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Fabian',
            'surname' => 'Huenchulaf',
            'email' => 'fabian@example.com',
            'password' => Hash::make('123456'),
            'remember_token' => null,
        ]);

        User::create([
            'name' => 'Pablo',
            'surname' => 'Yañez',
            'email' => 'pablo@example.com',
            'password' => Hash::make('12345'),
            'remember_token' => null,

        ]);
    }
}
