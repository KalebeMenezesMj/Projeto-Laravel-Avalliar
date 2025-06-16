@extends('template')
@section('titulo', 'Demandas')

@section('conteudo')

<style>
    .demanda-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.12) !important;
    }
    .btn-edit:hover { background-color: #ea580c !important; }
    .btn-delete:hover { background-color: #b91c1c !important; }
</style>

<div style="width: 95%; margin: 20px auto; box-sizing: border-box; font-family: 'Montserrat', sans-serif;">
    <h1 style="text-align: center; margin-bottom: 30px; color: #1f2937;">Painel de Demandas</h1>

    @if(session('sucesso'))
        <div style="background-color: #dcfce7; color: #166534; padding: 15px; border-radius: 8px; margin-bottom: 20px; text-align: center; font-weight: 600;">
            {{ session('sucesso') }}
        </div>
    @endif

    <div style="display: flex; flex-wrap: wrap; gap: 25px; justify-content: flex-start;">
        
        @forelse ($demandas as $demanda)
            @php
                $statusColor = '';
                switch ($demanda->status) {
                    case 'Aguardando Agendamento': $statusColor = '#f59e0b'; break;
                    case 'Agendada': $statusColor = '#3b82f6'; break;
                    case 'Vistoria Realizada': $statusColor = '#10b981'; break;
                    case 'Laudo em Elaboração': $statusColor = '#8b5cf6'; break;
                    case 'Finalizada': $statusColor = '#16a34a'; break;
                    case 'Cancelada': $statusColor = '#ef4444'; break;
                    default: $statusColor = '#6b7280'; break;
                }
            @endphp

            <div class="demanda-card" style="width: 350px; background-color: white; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.1); display: flex; flex-direction: column; justify-content: space-between; transition: transform 0.2s ease, box-shadow 0.2s ease;">
                
                <div style="padding: 20px;">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 10px;">
                        <h3 style="margin: 0; font-size: 1.2rem; color: #1f2937; max-width: 70%;">{{ $demanda->nome_cliente }}</h3>
                        
                        <span style="display: inline-block; padding: 4px 10px; border-radius: 12px; font-size: 0.8rem; font-weight: bold; color: white; text-transform: uppercase; background-color: {{ $statusColor }};">
                            {{ $demanda->status }}
                        </span>
                    </div>

                    <p style="margin: 4px 0 15px; color: #6b7280; font-size: 0.9rem; border-bottom: 1px solid #e5e7eb; padding-bottom: 15px;">
                        <strong>Contratante:</strong> {{ $demanda->empresa_contratante }}
                    </p>
                    
                    <p style="margin: 4px 0; font-size: 0.9rem;"><strong>Engenheiro:</strong> {{ $demanda->engenheiro_responsavel }}</p>
                    <p style="margin: 4px 0; font-size: 0.9rem;"><strong>Abertura:</strong> {{ \Carbon\Carbon::parse($demanda->data_abertura)->format('d/m/Y') }}</p>
                    <p style="margin: 4px 0; font-size: 0.9rem;"><strong>Endereço:</strong> {{ Str::limit($demanda->endereco, 40) }}</p>
                </div>

                <div style="background-color: #f9fafb; padding: 15px; text-align: right; display: flex; gap: 10px; justify-content: flex-end; border-top: 1px solid #e5e7eb;">
                    <a href="/frmeditdemanda/{{ $demanda->id }}" class="btn-edit" style="text-decoration: none; padding: 6px 12px; border-radius: 5px; color: white; font-size: 0.8rem; border: none; cursor: pointer; background-color: #f97316;">Editar</a>
                    
                    <form action="/excluirdemanda/{{ $demanda->id }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete" style="padding: 6px 12px; border-radius: 5px; color: white; font-size: 0.8rem; border: none; cursor: pointer; background-color: #dc2626;">Excluir</button>
                    </form>
                </div>
            </div>
        @empty
            <p style="width: 100%; text-align: center; padding: 40px; font-size: 1.1rem; color: #6b7280;">Nenhuma demanda encontrada.</p>
        @endforelse

    </div>
</div>
@endsection