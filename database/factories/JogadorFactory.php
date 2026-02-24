<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jogador>
 */
class JogadorFactory extends Factory
{
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
            'posicao' => $this->faker->randomElement(['GOLEIRO', 'LATERAL', 'ZAGUEIRO', 'VOLANTE', 'MEIA', 'PONTA', 'ATACANTE']),
            'numero' => $this->faker->numberBetween(1, 99),
        ];
    }
}
