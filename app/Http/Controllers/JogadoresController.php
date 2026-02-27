<?php

namespace App\Http\Controllers;

use App\Enums\Jogadores\Posicao;
use App\Http\Requests\jogadores\StoreJogadorRequest;
use App\Http\Requests\jogadores\UpdateJogadorRequest;
use App\Models\Jogador;

class JogadoresController extends Controller
{
    public function index()
    {
        $jogadores = Jogador::with('createdBy')->get();

        return view('jogadores.index', ['jogadores' => $jogadores]);
    }

    public function create()
    {
        return view('jogadores.form', ['posicoes' => Posicao::cases()]);
    }

    public function store(StoreJogadorRequest $request)
    {
        $dados = $request->validated();
        $dados['created_by'] = auth()->user()->id;
        $jogador = Jogador::create($dados);

        return redirect()->route('jogadores.show', $jogador)->with('sucesso', 'Jogador criado!');
    }

    public function show(Jogador $jogador)
    {
        return view('jogadores.show', ['jogador' => $jogador]);
    }

    public function edit(Jogador $jogador)
    {
        return view('jogadores.form', [
            'jogador' => $jogador,
            'posicoes' => Posicao::cases(),
        ]);
    }

    public function update(UpdateJogadorRequest $request, Jogador $jogador)
    {
        $jogador->update($request->validated());

        return redirect()->route('jogadores.show', $jogador)->with('sucesso', 'Jogador atualizado!');
    }

    public function destroy(Jogador $jogador)
    {
        $jogador->delete();

        return redirect()->route('jogadores.index')->with('sucesso', 'Jogador deletado!');
    }
}
