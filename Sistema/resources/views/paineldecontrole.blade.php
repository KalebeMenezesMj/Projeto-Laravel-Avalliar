@extends('template')
@section('titulo', 'Dashboard')

@section('conteudo')

<style>
    :root {
        --cor-primaria: #2563eb;
        --cor-texto-principal: #1f2937;
        --cor-texto-secundario: #4b5563;
        --cor-fundo: #f3f4f6;
        --cor-borda: #e5e7eb;
    }
    .dashboard-container {
        width: 95%;
        max-width: 1400px;
        margin: 0 auto;
        padding: 30px 20px;
    }

    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        flex-wrap: wrap;
        gap: 20px;
    }
    .dashboard-header h1 {
        font-size: 2rem;
        color: var(--cor-texto-principal);
        margin: 0;
    }
    .dashboard-header .welcome-text {
        font-size: 1.1rem;
        color: var(--cor-texto-secundario);
    }
    .action-buttons a {
        background-color: var(--cor-primaria);
        color: white;
        padding: 12px 20px;
        text-decoration: none;
        border-radius: 8px;
        font-weight: 600;
        transition: background-color 0.2s ease;
        display: inline-block; 
    }
    .action-buttons a:hover {
        background-color: #1d4ed8;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
        margin-bottom: 40px;
    }
    .stat-card {
        background-color: white;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        border: 1px solid var(--cor-borda);
    }
    .stat-card .stat-value {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--cor-primaria);
        margin: 0 0 5px 0;
    }
    .stat-card .stat-label {
        font-size: 1rem;
        color: var(--cor-texto-secundario);
        margin: 0;
    }

    .recent-activity h2 {
        font-size: 1.5rem;
        color: var(--cor-texto-principal);
        margin-bottom: 20px;
        border-bottom: 2px solid var(--cor-borda);
        padding-bottom: 10px;
    }
    .activity-table {
        width: 100%;
        border-collapse: collapse;
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        overflow: hidden;
    }
    .activity-table th, .activity-table td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid var(--cor-borda);
        white-space: nowrap; 
    }
    .activity-table thead {
        background-color: #f9fafb;
    }
    .activity-table th {
        font-size: 0.9rem;
        color: var(--cor-texto-secundario);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .status-badge {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 12px;
        font-size: 0.8rem;
        font-weight: bold;
        color: white;
        text-transform: uppercase;
    }
    .status-aguardando-agendamento { background-color: #f59e0b; }
    .status-agendada { background-color: #3b82f6; }
    .status-vistoria-realizada { background-color: #10b981; }
    .status-laudo-em-elaboração { background-color: #8b5cf6; }
    .status-finalizada { background-color: #16a34a; }
    .status-cancelada { background-color: #ef4444; }


    .table-responsive-wrapper {
        overflow-x: auto; 
        width: 100%;
        border-radius: 12px;
        border: 1px solid var(--cor-borda);
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }
    

    @media (max-width: 768px) {
        .dashboard-header {
            flex-direction: column; 
            align-items: flex-start; 
        }
        .action-buttons {
            width: 100%;
        }
        .action-buttons a {
            display: block; 
            text-align: center;
        }
        .activity-table {
            box-shadow: none; 
            border-radius: 0;
            border: none;
        }
    }

</style>

<div class="dashboard-container">
    <header class="dashboard-header">
        <div>
            <h1>Dashboard</h1>
            <p class="welcome-text">Bem-vindo(a) de volta, <strong>{{ session('usuario_nome') }}</strong>!</p>
        </div>
        <div class="action-buttons">
            <a href="/frmdemanda">Cadastrar Nova Demanda</a>
        </div>
    </header>

    <section class="stats-grid">
        <div class="stat-card">
            <p class="stat-value">{{ $totalDemandas ?? '0' }}</p>
            <p class="stat-label">Total de Demandas</p>
        </div>
        <div class="stat-card">
            <p class="stat-value">{{ $demandasPendentes ?? '0' }}</p>
            <p class="stat-label">Demandas Pendentes</p>
        </div>
        <div class="stat-card">
            <p class="stat-value">{{ $totalUsuarios ?? '0' }}</p>
            <p class="stat-label">Usuários Cadastrados</p>
        </div>
    </section>

    <section class="recent-activity">
        <h2>Últimas Demandas Cadastradas</h2>
        
        <div class="table-responsive-wrapper">
            <table class="activity-table">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Status</th>
                        <th>Engenheiro</th>
                        <th>Data Abertura</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ultimasDemandas as $demanda)
                        <tr>
                            <td><strong>{{ $demanda->nome_cliente }}</strong><br><small style="color: #6b7280;">{{ $demanda->empresa_contratante }}</small></td>
                            <td>
                                <span class="status-badge status-{{ strtolower(str_replace(' ', '-', $demanda->status)) }}">
                                    {{ $demanda->status }}
                                </span>
                            </td>
                            <td>{{ $demanda->engenheiro_responsavel }}</td>
                            <td>{{ \Carbon\Carbon::parse($demanda->data_abertura)->format('d/m/Y') }}</td>
                            <td>
                                <a href="/frmeditdemanda/{{ $demanda->id }}" style="color: var(--cor-primaria); font-weight: 600;">Ver/Editar</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center; padding: 30px;">Nenhuma demanda encontrada.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

</div>
@endsection