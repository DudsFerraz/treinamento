@extends('layouts.app')

@section('styles')
    @parent
    <style>
        .card-hover-shadow {
            transition: box-shadow 0.3s ease-in-out;
        }

        .card-hover-shadow:hover {
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
        }
    </style>
@endsection

@section('content')
    <div class="container my-5">

        <div class="text-center mb-5">
            <h1 class="display-4 font-weight-bold text-uppercase text-dark">Elenco de Jogadores</h1>
            <p class="text-muted lead mt-2">Total de jogadores cadastrados: {{ $jogadores->count() }}</p>
        </div>

        <div class="row">
            @foreach ($jogadores as $jogador)
                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">

                    <x-jogadores.card :jogador="$jogador" footer-link="{{ route('jogadores.show', $jogador) }}"
                        footer-text="Ver Perfil Completo &rarr;" class="h-100 card-hover-shadow" />

                </div>
            @endforeach
        </div>

        @if ($jogadores->isEmpty())
            <div class="card shadow-sm mx-auto p-5 text-center text-muted border-0"
                style="max-width: 400px; border-radius: 1rem;">
                <h5 class="mb-0">Nenhum jogador cadastrado no momento.</h5>
            </div>
        @endif

    </div>
@endsection
