<?php

namespace Database\Seeders;

use App\Models\Sport;
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
        $users = User::factory(3)->create();

        // Créer des sports associés à chaque utilisateur
        $users->each(function ($user) {
            Sport::factory(5)->create(['user_id' => $user->id]);
        });

        User::factory([
            'name' => "Alistar Meumeu",
            'email' => "alistar.meumeu@domain.fr",
            'email_verified_at' => now(),
            'password' => Hash::make('nePasPartager'),
            'remember_token' => Str::random(10),
            'role' => 'ADMIN',
        ])->create();

        User::factory([
            'name' => "Meumeu Alistar",
            'email' => "meumeu.alistarm@domain.fr",
            'email_verified_at' => now(),
            'password' => Hash::make('nePasPartager'),
            'remember_token' => Str::random(10),
            'role' => 'UTILISATEUR',
        ])->create();

    }
}
