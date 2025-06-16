@extends('template')
@section('titulo', 'Demandas')

@section('estilos')
<style>
    .status-badge { display: inline-block; padding: 4px 10px; border-radius: 12px; font-size: 0.8rem; font-weight: bold; color: white; text-transform: uppercase; }
    .status-aguardando-agendamento { background-color: #f59e0b; }
    .status-agendada { background-color: #3b82f6; }
    .status-vistoria-realizada { background-color: #10b981; }
    .status-laudo-em-elaboração { background-color: #8b5cf6; }
    .status-finalizada { background-color: #16a34a; }
    .status-cancelada { background-color: #ef4444; }
    .card-actions a, .card-actions button { text-decoration: none; padding: 6px 12px; border-radius: 5px; color: white; font-size: 0.8rem; border: none; cursor: pointer; transition: background-color 0.2s ease; }
    .btn-edit { background-color: #f97316; }
    .btn-delete { background-color: #dc2626; }
    .btn-edit:hover { background-color: #ea580c; }
    .btn-delete:hover { background-color: #b91c1c; }
</style>
@endsection

@section('conteudo')
<div style="width: 95%; margin: 20px auto; box-sizing: border-box;">
    <h1 style="text-align: center; margin-bottom: 30px;">Painel de Demandas</h1>
    @if(session('sucesso'))
        <div style="background-color: #dcfce7; color: #166534; padding: 15px; border-radius: 8px; margin-bottom: 20px; text-align: center;">
            {{ session('sucesso') }}
        </div>
    @endif
    <div style="display: flex; flex-wrap: wrap; gap: 25px; justify-content: flex-start;">
        @forelse ($demandas as $demanda)
            <div style="width: 350px; background-color: white; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.1); display: flex; flex-direction: column; justify-content: space-between;">
                <div style="padding: 20px;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 10px;">
                        <h3 style="margin: 0; font-size: 1.2rem; color: #1f2937; max-width: 70%;">{{ $demanda->nome_cliente }}</h3>
                        <span class="status-badge status-{{ strtolower(str_replace(' ', '-', $demanda->status)) }}">{{ $demanda->status }}</span>
                    </div>
                    <p style="margin: 4px 0 15px; color: #6b7280; font-size: 0.9rem; border-bottom: 1px solid #e5e7eb; padding-bottom: 15px;">
                        <strong>Contratante:</strong> {{ $demanda->empresa_contratante }}
                    </p>
                    <p style="margin: 4px 0; font-size: 0.9rem;"><strong>Engenheiro:</strong> {{ $demanda->engenheiro_responsavel }}</p>
                    <p style="margin: 4px 0; font-size: 0.9rem;"><strong>Abertura:</strong> {{ \Carbon\Carbon::parse($demanda->data_abertura)->format('d/m/Y') }}</p>
                    <p style="margin: 4px 0; font-size: 0.9rem;"><strong>Endereço:</strong> {{ Str::limit($demanda->endereco, 40) }}</p>
                </div>
                <div class="card-actions" style="background-color: #f9fafb; padding: 15px; text-align: right; display: flex; gap: 10px; justify-content: flex-end;">
                    <a href="/frmeditdemanda/{{ $demanda->id }}" class="btn-edit">Editar</a>
                    <form action="/excluirdemanda/{{ $demanda->id }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Excluir</button>
                    </form>
                </div>
            </div>
        @empty
            <p style="width: 100%; text-align: center;">Nenhuma demanda encontrada.</p>
        @endforelse
    </div>
</div>
@endsection