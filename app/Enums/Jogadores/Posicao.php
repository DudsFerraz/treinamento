<?php

namespace App\Enums\Jogadores;

enum Posicao: string 
{
    case GOLEIRO = 'GOLEIRO';
    case LATERAL = 'LATERAL';
    case ZAGUEIRO = 'ZAGUEIRO';
    case VOLANTE = 'VOLANTE';
    case MEIA = 'MEIA';
    case PONTA = 'PONTA';
    case ATACANTE = 'ATACANTE';

    public static function valores(): array
    {
        return array_column(self::cases(), 'value');
    }
}