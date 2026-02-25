@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center my-5">
        
        <div class="card shadow" style="width: 100%; max-width: 30rem; border-radius: 1rem;">
            
            {{-- Cabeçalho --}}
            <div class="card-header bg-success text-white text-center py-4" style="border-top-left-radius: 1rem; border-top-right-radius: 1rem;">
                <h3 class="font-weight-bold text-uppercase text-truncate mb-1">
                    {{ isset($jogador) && $jogador->id ? 'Editar Jogador' : 'Novo Jogador' }}
                </h3>
                <small class="d-block text-uppercase font-weight-bold" style="letter-spacing: 1px; opacity: 0.8;">
                    {{ isset($jogador) && $jogador->id ? 'Atualizar dados do registro #' . $jogador->id : 'Cadastrar no sistema' }}
                </small>
            </div>

            @php
                // Define a rota de destino (Update ou Store)
                $actionUrl = isset($jogador) && $jogador->id 
                    ? route('jogadores.update', $jogador->id) 
                    : route('jogadores.store');
            @endphp

            {{-- Início do Formulário --}}
            <form action="{{ $actionUrl }}" method="POST" class="card-body p-4">
                @csrf 
                
                @if(isset($jogador) && $jogador->id)
                    @method('PUT')
                @endif

                {{-- Campo: Nome --}}
                <div class="form-group mb-4">
                    <label for="nome" class="text-muted small font-weight-bold text-uppercase mb-1">Nome Completo</label>
                    <input type="text" name="nome" id="nome" 
                           value="{{ old('nome', $jogador->nome ?? '') }}" 
                           class="form-control form-control-lg @error('nome') is-invalid @enderror"
                           placeholder="Ex: Raphael Veiga">
                    @error('nome')
                        <div class="invalid-feedback font-weight-bold">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Campo: Time --}}
                <div class="form-group mb-4">
                    <label for="time" class="text-muted small font-weight-bold text-uppercase mb-1">Time</label>
                    <input type="text" name="time" id="time" 
                           value="{{ old('time', $jogador->time ?? '') }}" 
                           class="form-control form-control-lg @error('time') is-invalid @enderror"
                           placeholder="Ex: Palmeiras">
                    @error('time')
                        <div class="invalid-feedback font-weight-bold">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-row mb-4">
                    {{-- Campo: Posição --}}
                    <div class="form-group col-md-8 mb-0">
                        <label for="posicao" class="text-muted small font-weight-bold text-uppercase mb-1">Posição</label>
                        <select name="posicao" id="posicao" class="form-control form-control-lg text-uppercase @error('posicao') is-invalid @enderror">
                            <option value="">Selecione...</option>
                            @foreach(['GOLEIRO', 'LATERAL', 'ZAGUEIRO', 'VOLANTE', 'MEIA', 'PONTA', 'ATACANTE'] as $pos)
                                <option value="{{ $pos }}" @selected(old('posicao', $jogador->posicao ?? '') == $pos)>
                                    {{ $pos }}
                                </option>
                            @endforeach
                        </select>
                        @error('posicao')
                            <div class="invalid-feedback font-weight-bold">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Campo: Número --}}
                    <div class="form-group col-md-4 mb-0">
                        <label for="numero" class="text-muted small font-weight-bold text-uppercase mb-1">Número</label>
                        <input type="number" name="numero" id="numero" 
                               value="{{ old('numero', $jogador->numero ?? '') }}" 
                               class="form-control form-control-lg text-center font-weight-bold @error('numero') is-invalid @enderror"
                               placeholder="00">
                        @error('numero')
                            <div class="invalid-feedback font-weight-bold">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                {{-- Botão de Salvar --}}
                <button type="submit" class="btn btn-success btn-lg btn-block font-weight-bold text-uppercase mt-4" style="letter-spacing: 1px;">
                    {{ isset($jogador) && $jogador->id ? 'Salvar Alterações' : 'Cadastrar Jogador' }}
                </button>
            </form>

            {{-- Rodapé / Voltar --}}
            <div class="card-footer bg-light text-center py-3" style="border-bottom-left-radius: 1rem; border-bottom-right-radius: 1rem;">
                <a href="{{ route('jogadores.index') }}" class="text-success font-weight-bold text-decoration-none">
                    &larr; Cancelar e Voltar
                </a>
            </div>
            
        </div>
    </div>
@endsection