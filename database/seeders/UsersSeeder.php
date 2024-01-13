<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory([
            'name' => "Alistar meumeu",
            'email' => "alistar.meumeu@domain.fr",
            'email_verified_at' => now(),
            'password' => Hash::make('nePasPartager'),
            'remember_token' => Str::random(10),
        ])->create();
        User::factory(3)->create();

    }
}
