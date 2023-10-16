<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sport>
 */
class SportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Sport::class;

    public function definition()
    {
        return [
            'nom' => $this->sportName(),
            'description' => $this->sportDescription(),
            'annee_ajout' => $this->faker->numberBetween(2000, 2023),
            'nb_disciplines' => $this->faker->numberBetween(1, 10),
            'nb_epreuves' => $this->faker->numberBetween(1, 50),
        ];
    }

    // Méthode pour générer un nom de sport réaliste
    public function sportName()
    {
        $sports = ['Football', 'Basketball', 'Tennis', 'Natation', 'Athlétisme'];
        return $this->faker->randomElement($sports);
    }

    // Méthode pour générer une description de sport réaliste
    public function sportDescription()
    {
        $descriptions = [
            'Le sport le plus populaire au monde.',
            'Un sport passionnant pour les amateurs de vitesse.',
            'Idéal pour les athlètes aquatiques.',
            'Le sport roi de la balle orange.',
        ];
        return $this->faker->randomElement($descriptions);
    }
}
