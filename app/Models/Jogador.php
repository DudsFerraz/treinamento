<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jogador extends Model
{
    protected $table = 'jogadores';

    protected $fillable = [
        'nome',
        'time',
        'posicao',
        'numero',
        'created_by'
    ];

    use HasFactory;

    public function createdBy(){
        return $this->belongsTo(User::class, "created_by");
    }
}
