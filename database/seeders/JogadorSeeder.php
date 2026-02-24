<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jogador;

class JogadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jogador = [
            'nome' => 'Raphael Veiga',
            'time' => 'Palmeiras',
            'posicao' => 'MEIA',
            'numero' => 23
        ];
        Jogador::create($jogador);

        $jogador = [
            'nome' => 'Gustavo Scarpa',
            'time' => 'Palmeiras',
            'posicao' => 'MEIA',
            'numero' => 14
        ];
        Jogador::create($jogador);

        $jogador = [
            'nome' => 'Dudu',
            'time' => 'Palmeiras',
            'posicao' => 'PONTA',
            'numero' => 7
        ];
        Jogador::create($jogador);

        $jogadores = Jogador::factory()->count(77)->create();
    }
}
