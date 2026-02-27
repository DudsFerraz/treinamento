<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogador extends Model
{
    protected $table = 'jogadores';

    protected $fillable = [
        'nome',
        'time',
        'posicao',
        'numero',
        'created_by',
        'gols',
    ];

    use HasFactory;

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    //CONFERIR SE ISSO TA FUNCIONANDO
    protected function posicao(): Attribute
    {
        return Attribute::make(
            get: fn (string $pos) => ucfirst(strtolower($pos)),
            set: fn (string $pos) => strtoupper($pos),
        );
    }
}
