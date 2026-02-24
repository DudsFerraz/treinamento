<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Jogador</title>
    <script src="https://cdn.tailwindcss.com"></script> 
</head>
<body class="bg-slate-100 flex items-center justify-center min-h-screen font-sans">

    <div class="max-w-sm w-full bg-white rounded-2xl shadow-xl overflow-hidden border border-slate-200">
        <div class="bg-gradient-to-br from-emerald-600 to-emerald-900 p-6 text-center text-white relative">
            <div class="text-xs uppercase tracking-widest mb-1 text-emerald-200 font-semibold">
                Registro #{{ $jogador->id ?? $jogador->id }}
            </div>
            <h1 class="text-3xl font-bold uppercase truncate">
                {{ $jogador->nome ?? 'Nome do Jogador' }}
            </h1>
        </div>

        <div class="p-6">
            <div class="flex justify-between items-center mb-4 pb-4 border-b border-slate-100">
                <span class="text-slate-500 font-medium text-sm uppercase">Time</span>
                <span class="text-slate-800 font-bold text-lg">{{ $jogador->time ?? 'Time Indefinido' }}</span>
            </div>
            
            <div class="flex justify-between items-center mb-4 pb-4 border-b border-slate-100">
                <span class="text-slate-500 font-medium text-sm uppercase">Posição</span>
                <span class="bg-emerald-100 text-emerald-800 text-xs font-bold px-3 py-1 rounded-full uppercase">
                    {{ $jogador->posicao ?? 'POSIÇÃO' }}
                </span>
            </div>

            <div class="flex justify-between items-center">
                <span class="text-slate-500 font-medium text-sm uppercase">Número da Camisa</span>
                <span class="text-4xl font-black text-slate-800">{{ $jogador->numero ?? '00' }}</span>
            </div>
        </div>

        <div class="bg-slate-50 p-4 text-center border-t border-slate-100">
            <a href="{{url('/')}}" class="text-sm font-semibold text-emerald-600 hover:text-emerald-800 transition-colors">
                &larr; Voltar para a página inicial
            </a>
        </div>
    </div>

</body>
</html>