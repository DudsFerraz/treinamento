<?php

namespace App\Http\Controllers;

use App\Enums\Jogadores\Posicao;
use App\Http\Requests\jogadores\StoreJogadorRequest;
use App\Http\Requests\jogadores\UpdateJogadorRequest;
use App\Models\Jogador;
use Illuminate\Http\Request;

class JogadoresController extends Controller
{
    public function index(Request $request)
    {

        $jogadores = Jogador::with('createdBy')
            ->when($request->search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nome', 'LIKE', "%{$search}%")
                        ->orWhere('time', 'LIKE', "%{$search}%");
                });
            })
            ->paginate(4);

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
        $dados['picture_path'] = $request->file('picture')->store('jogadores', 'public');
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
        $dados = $request->validated();
        if($request->hasFile('picture')) {
            $dados['picture_path'] = $request->file('picture')->store('jogadores', 'public');
        }

        $jogador->update($request->validated());
        return redirect()->route('jogadores.show', $jogador)->with('sucesso', 'Jogador atualizado!');
    }

    public function destroy(Jogador $jogador)
    {
        $jogador->delete();

        return redirect()->route('jogadores.index')->with('sucesso', 'Jogador deletado!');
    }
}
