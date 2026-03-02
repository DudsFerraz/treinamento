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
        </div>

        <form method="get" action="{{ route('jogadores.index') }}" class="mb-4">
            <div class="row">
                <div class=" col-sm input-group">
                    <input type="text" class="form-control" name="search" value="{{ request()->search }}">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-success"> Buscar </button>
                    </span>
                </div>
            </div>
        </form>

        <br>

        {{ $jogadores->appends(request()->query())->links() }}

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
