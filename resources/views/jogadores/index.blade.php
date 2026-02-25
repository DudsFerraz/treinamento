@extends('layouts.app')

@section('styles')
    @parent
    <style>
        .card-hover-shadow { transition: box-shadow 0.3s ease-in-out; }
        .card-hover-shadow:hover { box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important; }
    </style>
@endsection

@section('content')
    <div class="container my-5">
        
        {{-- Cabeçalho da Página --}}
        <div class="text-center mb-5">
            <h1 class="display-4 font-weight-bold text-uppercase text-dark">Elenco de Jogadores</h1>
            <p class="text-muted lead mt-2">Total de jogadores cadastrados: {{ $jogadores->count() }}</p>
        </div>

        {{-- Grid do Bootstrap --}}
        <div class="row">
            
            @foreach ($jogadores as $jogador)
                {{-- 1 coluna no celular (col-12), 2 no tablet (col-md-6), 3 no desktop (col-lg-4), 4 em telas largas (col-xl-3) --}}
                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                    
                    {{-- Estrutura do Card --}}
                    <div class="card h-100 shadow-sm border-0 card-hover-shadow" style="border-radius: 1rem; overflow: hidden;">
                        
                        {{-- Cabeçalho do Card --}}
                        <div class="card-header bg-success text-white text-center py-3 border-0">
                            <small class="d-block text-uppercase font-weight-bold mb-1" style="letter-spacing: 1px; opacity: 0.8;">
                                Registro #{{ $jogador->id }}
                            </small>
                            <h4 class="font-weight-bold text-uppercase text-truncate mb-0" title="{{ $jogador->nome }}">
                                {{ $jogador->nome }}
                            </h4>
                        </div>

                        {{-- Corpo do Card --}}
                        <div class="card-body d-flex flex-column p-4">
                            
                            <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                                <span class="text-muted small font-weight-bold text-uppercase">Time</span>
                                <span class="text-dark font-weight-bold">{{ $jogador->time }}</span>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                                <span class="text-muted small font-weight-bold text-uppercase">Posição</span>
                                <span class="badge badge-success badge-pill text-uppercase px-2 py-1">
                                    {{ $jogador->posicao }}
                                </span>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-auto pt-2">
                                <span class="text-muted small font-weight-bold text-uppercase">Número</span>
                                <span class="h1 font-weight-bold text-dark mb-0">{{ $jogador->numero }}</span>
                            </div>
                        </div>

                        {{-- Rodapé do Card --}}
                        <div class="card-footer bg-light text-center py-3 border-0">
                            {{-- Dica: Usando a função route() do Laravel ao invés de concatenar string na url() --}}
                            <a href="{{ route('jogadores.show', $jogador) }}" class="text-success font-weight-bold text-uppercase small text-decoration-none d-block w-100">
                                Ver Perfil Completo &rarr;
                            </a>
                        </div>
                        
                    </div>
                </div>
            @endforeach

        </div>

        {{-- Mensagem caso não tenha jogadores --}}
        @if($jogadores->isEmpty())
            <div class="card shadow-sm mx-auto p-5 text-center text-muted border-0" style="max-width: 400px; border-radius: 1rem;">
                <h5 class="mb-0">Nenhum jogador cadastrado no momento.</h5>
            </div>
        @endif

    </div>
@endsection