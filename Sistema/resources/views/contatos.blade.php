@extends('template')
@section('titulo', 'Mensagens de Contato')

@section('conteudo')
<style>
    .container-contatos { width: 95%; max-width: 1200px; margin: 30px auto; }
    .tabela-contatos { width: 100%; border-collapse: collapse; background: white; box-shadow: 0 4px 15px rgba(0,0,0,0.08); border-radius: 8px; overflow: hidden; }
    .tabela-contatos th, .tabela-contatos td { padding: 15px; text-align: left; border-bottom: 1px solid #e5e7eb; }
    .tabela-contatos thead { background-color: #f9fafb; }
    .tabela-contatos th { color: #6b7280; font-size: 0.9rem; text-transform: uppercase; }
    .tabela-contatos .acoes-cell { display: flex; gap: 10px; }
    .btn-acao { text-decoration: none; color: white; padding: 6px 12px; border-radius: 5px; font-size: 0.8rem; border: none; cursor: pointer; }
    .btn-responder { background-color: #e53935; }
    .btn-excluir { background-color: #4b5563; }
</style>

<div class="container-contatos">
    <h1 style="text-align: center; margin-bottom: 30px;">Mensagens de Contato</h1>

    @if(session('sucesso_contato'))
        <div style="background-color: #dcfce7; color: #166534; padding: 15px; border-radius: 8px; margin-bottom: 20px; text-align: center;">
            {{ session('sucesso_contato') }}
        </div>
    @endif

    <table class="tabela-contatos">
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Assunto</th>
                <th>Mensagem</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($contatos as $contato)
                <tr>
                    <td>{{ $contato->nome }}</td>
                    <td>{{ $contato->email }}</td>
                    <td>{{ $contato->assunto }}</td>
                    <td>{{ Str::limit($contato->mensagem, 50) }}</td>
                    <td class="acoes-cell">
                        <a href="" class="btn-acao btn-responder">Responder</a>

                        <form action="/contatos/{{ $contato->id }}" method="POST" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-acao btn-excluir">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center; padding: 30px;">Nenhuma mensagem recebida.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection