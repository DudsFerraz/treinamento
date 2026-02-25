@extends('layouts.app')

@section('styles')
    @parent
@endsection

@section('content')
    <div class="d-flex justify-content-center align-items-center my-5">
        
        {{-- Card do Bootstrap --}}
        <div class="card shadow" style="width: 100%; max-width: 24rem; border-radius: 1rem;">
            
            {{-- Cabeçalho do Card --}}
            <div class="card-header bg-success text-white text-center py-4" style="border-top-left-radius: 1rem; border-top-right-radius: 1rem;">
                <small class="d-block text-uppercase font-weight-bold mb-1" style="letter-spacing: 2px; opacity: 0.8;">
                    Registro #{{ $jogador->id }}
                </small>
                <h3 class="font-weight-bold text-uppercase text-truncate mb-0">
                    {{ $jogador->nome }}
                </h3>
            </div>

            {{-- Corpo do Card --}}
            <div class="card-body p-4">
                
                {{-- Linha: Time --}}
                <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                    <span class="text-muted small font-weight-bold text-uppercase">Time</span>
                    <span class="text-dark font-weight-bold h5 mb-0">{{ $jogador->time }}</span>
                </div>
                
                {{-- Linha: Posição --}}
                <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                    <span class="text-muted small font-weight-bold text-uppercase">Posição</span>
                    {{-- Badge do Bootstrap em formato de pílula --}}
                    <span class="badge badge-success badge-pill text-uppercase px-3 py-2">
                        {{ $jogador->posicao }}
                    </span>
                </div>

                {{-- Linha: Número --}}
                <div class="d-flex justify-content-between align-items-center">
                    <span class="text-muted small font-weight-bold text-uppercase">Número da Camisa</span>
                    <span class="text-dark font-weight-bold display-4 mb-0">{{ $jogador->numero }}</span>
                </div>
                
            </div>

            {{-- Rodapé do Card --}}
            <div class="card-footer bg-light text-center py-3" style="border-bottom-left-radius: 1rem; border-bottom-right-radius: 1rem;">
                <a href="{{ url('/jogadores') }}" class="text-success font-weight-bold text-decoration-none">
                    &larr; Voltar para a página inicial
                </a>
            </div>
            
        </div>

    </div>
@endsection