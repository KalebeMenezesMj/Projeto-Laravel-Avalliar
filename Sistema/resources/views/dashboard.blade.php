@extends('template')
@section('titulo', 'Dashboard')

@section('conteudo')
<style>
    .dashboard-container {
        width: 100%;
        max-width: 1100px;
        margin: 40px auto;
        padding: 20px;
        box-sizing: border-box;
    }
    .welcome-box {
        text-align: center;
        margin-bottom: 40px;
    }
    .welcome-box h1 {
        font-size: 2.2rem;
        font-weight: 600;
        color: #1f2937;
    }
    .actions-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 30px;
    }
    .action-card {
        background-color: white;
        border-radius: 12px;
        padding: 25px;
        text-align: center;
        text-decoration: none;
        color: inherit;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.07);
        border: 1px solid #e5e7eb;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .action-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }
    .action-card .icon {
        font-size: 3rem;
        margin-bottom: 15px;
    }
    .action-card h3 {
        font-size: 1.1rem;
        font-weight: 600;
        color: #2563eb;
        margin: 0 0 8px 0;
    }
    .action-card p {
        font-size: 0.9rem;
        color: #6b7280;
        line-height: 1.5;
        margin: 0;
    }
</style>

<div class="dashboard-container">
    <div class="welcome-box">
        <h1>Bem-vindo(a), <strong>{{ session('usuario_nome', 'Usuário') }}</strong>!</h1>
    </div>

    <div class="actions-grid">
        
        <a href="/frmdemanda" class="action-card">
            <div class="icon">📋</div>
            <h3>Nova Demanda</h3>
            <p>Iniciar o cadastro de uma nova avaliação</p>
        </a>

        <a href="/produtos" class="action-card">
            <div class="icon">📂</div>
            <h3>Listar Demandas</h3>
            <p>Visualizar todas as avaliações em andamento</p>
        </a>

        <a href="/painel-de-controle" class="action-card">
            <div class="icon">📊</div>
            <h3>Painel de Controle</h3>
            <p>Ver estatísticas e atividades recentes</p>
        </a>

        <a href="/frmusuario" class="action-card">
            <div class="icon">👤</div>
            <h3>Novo Usuário</h3>
            <p>Adicionar um novo utilizador ao sistema</p>
        </a>

        <a href="/usuarios" class="action-card">
            <div class="icon">👥</div>
            <h3>Gerir Usuários</h3>
            <p>Visualizar e editar todos os utilizadores</p>
        </a>

        <a href="/contatos" class="action-card">
            <div class="icon">📧</div>
            <h3>Mensagens de Contato</h3>
            <p>Visualizar as mensagens enviadas pelo formulário</p>
        </a>

    </div>
</div>
@endsection