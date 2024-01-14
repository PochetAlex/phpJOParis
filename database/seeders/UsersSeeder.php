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
    }
}
