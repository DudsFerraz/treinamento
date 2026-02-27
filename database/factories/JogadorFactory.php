<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Jogador;
use App\Models\User;
use App\Enums\Posicao;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jogador>
 */
class JogadorFactory extends Factory
{   
    protected $model = Jogador::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */ 
    public function definition(): array
    {
        return [
            'nome' => $this->faker->name(),
            'time' => $this->faker->company(),
            'posicao' => $this->faker->randomElement(Posicao::valores()),
            'numero' => $this->faker->numberBetween(1, 99),
            'created_by' => User::factory(),
            'gols' => $this->faker->numberBetween(0, 1000)
        ];
    }
}
