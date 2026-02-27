<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jogador;
use App\Models\User;

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
            'created_by' => $testUser->id
        ];
        Jogador::create($jogador);

        $jogador = [
            'nome' => 'Gustavo Scarpa',
            'time' => 'Palmeiras',
            'posicao' => 'MEIA',
            'numero' => 14,
            'created_by' => $testUser->id
        ];
        Jogador::create($jogador);

        $jogador = [
            'nome' => 'Dudu',
            'time' => 'Palmeiras',
            'posicao' => 'PONTA',
            'numero' => 7,
            'created_by' => $testUser->id
        ];
        Jogador::create($jogador);

        $jogadores = Jogador::factory()->count(5)->create();
    }
}
