<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($jogador) && $jogador->id ? 'Editar Jogador' : 'Novo Jogador' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 flex items-center justify-center min-h-screen font-sans p-4">

    <div class="max-w-md w-full bg-white rounded-2xl shadow-xl overflow-hidden border border-slate-200">
        
        <div class="bg-gradient-to-br from-emerald-600 to-emerald-900 p-6 text-center text-white relative">
            <h1 class="text-3xl font-bold uppercase truncate">
                {{ isset($jogador) && $jogador->id ? 'Editar Jogador' : 'Novo Jogador' }}
            </h1>
            <div class="text-xs uppercase tracking-widest mt-1 text-emerald-200 font-semibold">
                {{ isset($jogador) && $jogador->id ? 'Atualizar dados do registro #' . $jogador->id : 'Cadastrar no sistema' }}
            </div>
        </div>

        @php
            // Define a rota de destino (Update ou Store)
            $actionUrl = isset($jogador) && $jogador->id 
                ? route('jogadores.update', $jogador->id) 
                : route('jogadores.store');
        @endphp

        <form action="{{ $actionUrl }}" method="POST" class="p-6">
            @csrf @if(isset($jogador) && $jogador->id)
                @method('PUT')
            @endif

            <div class="mb-4">
                <label for="nome" class="block text-slate-500 font-medium text-xs uppercase mb-1">Nome Completo</label>
                <input type="text" name="nome" id="nome" 
                       value="{{ old('nome', $jogador->nome ?? '') }}" 
                       class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-colors @error('nome') border-red-500 ring-red-500 @enderror"
                       placeholder="Ex: Raphael Veiga">
                @error('nome')
                    <span class="text-red-500 text-xs font-bold mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="time" class="block text-slate-500 font-medium text-xs uppercase mb-1">Time</label>
                <input type="text" name="time" id="time" 
                       value="{{ old('time', $jogador->time ?? '') }}" 
                       class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-colors @error('time') border-red-500 @enderror"
                       placeholder="Ex: Palmeiras">
                @error('time')
                    <span class="text-red-500 text-xs font-bold mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex gap-4 mb-6">
                <div class="w-2/3">
                    <label for="posicao" class="block text-slate-500 font-medium text-xs uppercase mb-1">Posição</label>
                    <select name="posicao" id="posicao" class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-colors uppercase text-sm @error('posicao') border-red-500 @enderror">
                        <option value="">Selecione...</option>
                        @foreach(['GOLEIRO', 'LATERAL', 'ZAGUEIRO', 'VOLANTE', 'MEIA', 'PONTA', 'ATACANTE'] as $pos)
                            <option value="{{ $pos }}" {{ old('posicao', $jogador->posicao ?? '') == $pos ? 'selected' : '' }}>
                                {{ $pos }}
                            </option>
                        @endforeach
                    </select>
                    @error('posicao')
                        <span class="text-red-500 text-xs font-bold mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-1/3">
                    <label for="numero" class="block text-slate-500 font-medium text-xs uppercase mb-1">Número</label>
                    <input type="number" name="numero" id="numero" 
                           value="{{ old('numero', $jogador->numero ?? '') }}" 
                           class="w-full px-4 py-2 bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition-colors text-center font-bold text-slate-700 @error('numero') border-red-500 @enderror"
                           placeholder="00">
                    @error('numero')
                        <span class="text-red-500 text-xs font-bold mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <button type="submit" class="w-full bg-emerald-600 text-white font-bold text-sm uppercase tracking-wider py-3 px-4 rounded-lg hover:bg-emerald-700 active:bg-emerald-800 transition-colors shadow-md">
                {{ isset($jogador) && $jogador->id ? 'Salvar Alterações' : 'Cadastrar Jogador' }}
            </button>
        </form>

        <div class="bg-slate-50 p-4 text-center border-t border-slate-100">
            <a href="{{ route('jogadores.index') }}" class="text-sm font-semibold text-emerald-600 hover:text-emerald-800 transition-colors">
                &larr; Cancelar e Voltar
            </a>
        </div>
    </div>

</body>
</html>