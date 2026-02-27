<?php

namespace Database\Seeders;

use App\Models\Jogador;
use App\Models\User;
use Illuminate\Database\Seeder;

class JogadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $testUser = User::first() ?? User::factory()->create();

        $jogador = [
            'nome' => 'Raphael Veiga',
            'time' => 'Palmeiras',
            'posicao' => 'MEIA',
            'numero' => 23,
            'created_by' => $testUser->id,
            'gols' => 109,
        ];
        Jogador::create($jogador);

        $jogador = [
            'nome' => 'Gustavo Scarpa',
            'time' => 'Palmeiras',
            'posicao' => 'MEIA',
            'numero' => 14,
            'created_by' => $testUser->id,
            'gols' => 44,
        ];
        Jogador::create($jogador);

        $jogador = [
            'nome' => 'Dudu',
            'time' => 'Palmeiras',
            'posicao' => 'PONTA',
            'numero' => 7,
            'created_by' => $testUser->id,
            'gols' => 88,
        ];
        Jogador::create($jogador);

        $jogadores = Jogador::factory()->count(5)->create();
    }
}
