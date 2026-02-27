@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center align-items-center my-5">

        <div style="width: 100%; max-width: 24rem;">
            <x-jogadores.card :jogador="$jogador" footer-link="{{ route('jogadores.index') }}"
                footer-text="&larr; Voltar para a página inicial" class="shadow" />
        </div>

    </div>
@endsection
