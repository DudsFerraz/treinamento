@props(['jogador', 'footerLink', 'footerText'])

<div {{ $attributes->merge(['class' => 'card shadow-sm border-0']) }} style="border-radius: 1rem; overflow: hidden;">

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

        <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
            <span class="text-muted small font-weight-bold text-uppercase">Número</span>
            <span class="h2 font-weight-bold text-dark mb-0">{{ $jogador->numero }}</span>
        </div>

        <div class="mt-auto text-center pt-2">
            <span class="text-muted small text-uppercase d-block mb-1">Registrado por:</span>
            <span class="badge badge-light text-secondary border px-2 py-1">
                <i class="fas fa-user mr-1"></i>
                {{ $jogador->createdBy->name ?? 'Sistema' }}
            </span>
        </div>
    </div>

    {{-- Rodapé do Card --}}
    <div class="card-footer bg-light text-center py-3 border-0">
        <a href="{{ $footerLink }}"
            class="text-success font-weight-bold text-uppercase small text-decoration-none d-block w-100">
            {!! $footerText !!}
        </a>
    </div>

</div>
