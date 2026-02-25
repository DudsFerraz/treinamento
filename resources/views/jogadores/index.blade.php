@extends('layouts.app')

@section('styles')
    @parent
    <script src="https://cdn.tailwindcss.com"></script> 
@endsection


@section('content')
    <div class="max-w-7xl mx-auto mb-8 text-center">
        <h1 class="text-4xl font-black text-slate-800 uppercase tracking-tight">Elenco de Jogadores</h1>
        <p class="text-slate-500 mt-2">Total de jogadores cadastrados: {{ $jogadores->count() }}</p>
    </div>

    <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">
        
        @foreach ($jogadores as $jogador)
            <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-shadow duration-300 overflow-hidden border border-slate-200 flex flex-col">
                
                <div class="bg-gradient-to-br from-emerald-600 to-emerald-900 p-5 text-center text-white relative">
                    <div class="text-[10px] uppercase tracking-widest mb-1 text-emerald-200 font-semibold">
                        Registro #{{ $jogador->id }}
                    </div>
                    <h2 class="text-2xl font-bold uppercase truncate" title="{{ $jogador->nome }}">
                        {{ $jogador->nome }}
                    </h2>
                </div>

                <div class="p-5 flex-grow">
                    <div class="flex justify-between items-center mb-3 pb-3 border-b border-slate-100">
                        <span class="text-slate-500 font-medium text-xs uppercase">Time</span>
                        <span class="text-slate-800 font-bold">{{ $jogador->time }}</span>
                    </div>
                    
                    <div class="flex justify-between items-center mb-3 pb-3 border-b border-slate-100">
                        <span class="text-slate-500 font-medium text-xs uppercase">Posição</span>
                        <span class="bg-emerald-100 text-emerald-800 text-[10px] font-bold px-2 py-1 rounded-full uppercase">
                            {{ $jogador->posicao }}
                        </span>
                    </div>

                    <div class="flex justify-between items-center mt-2">
                        <span class="text-slate-500 font-medium text-xs uppercase">Número</span>
                        <span class="text-3xl font-black text-slate-800">{{ $jogador->numero }}</span>
                    </div>
                </div>

                <div class="bg-slate-50 p-3 text-center border-t border-slate-100 mt-auto">
                    <a href="{{ url('/jogadores/' . $jogador->id) }}" class="text-xs font-bold text-emerald-600 hover:text-emerald-800 transition-colors uppercase tracking-wider block w-full">
                        Ver Perfil Completo &rarr;
                    </a>
                </div>
                
            </div>
        @endforeach
        </div>

    @if($jogadores->isEmpty())
        <div class="max-w-md mx-auto bg-white p-8 rounded-2xl shadow text-center text-slate-500 mt-12">
            Nenhum jogador cadastrado no momento.
        </div>
    @endif
@endsection