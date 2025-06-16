@extends('template')
@section('titulo', 'Usuários')

@section('conteudo')

<div style="width: 90%; margin: 40px auto; padding: 20px; box-sizing: border-box;">
    <h2 style="font-size: 24px; margin-bottom: 20px; text-align: center;">Lista de Usuários</h2>

    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; box-shadow: 0 0 10px rgba(0,0,0,0.1); border-radius: 10px; overflow: hidden;">
            <thead style="background-color: #4F46E5; color: white;">
                <tr>
                    <th style="padding: 12px 16px; text-align: left;">Nome</th>
                    <th style="padding: 12px 16px; text-align: left;">E-mail</th>
                    <th style="padding: 12px 16px; text-align: left;">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $u)
                    <tr style="border-bottom: 1px solid #eee; transition: background 0.3s;" onmouseover="this.style.background='#f9f9f9'" onmouseout="this.style.background='white'">
                        <td style="padding: 12px 16px;">{{ $u->nome }}</td>
                        <td style="padding: 12px 16px;">{{ $u->email }}</td>
                        <td style="padding: 12px 16px; white-space: nowrap;">
                            <a href="/frmeditusuario/{{ $u->id }}" 
                               style="background-color: #4F46E5; 
                                      color: white; 
                                      padding: 6px 12px; 
                                      border-radius: 6px; 
                                      text-decoration: none; 
                                      font-weight: bold; 
                                      margin-right: 10px; 
                                      display: inline-block;"
                               onmouseover="this.style.backgroundColor='#3730A3'"
                               onmouseout="this.style.backgroundColor='#4F46E5'">
                                Editar
                            </a>

                            <form action="/excluirusuario/{{ $u->id }}" method="post" style="display: inline;">
                                @csrf
                                @method('delete')
                                <button type="submit"
                                        style="background-color: #DC2626; 
                                               color: white; 
                                               padding: 6px 12px; 
                                               border: none; 
                                               border-radius: 6px; 
                                               font-weight: bold; 
                                               cursor: pointer;"
                                        onmouseover="this.style.backgroundColor='#991B1B'"
                                        onmouseout="this.style.backgroundColor='#DC2626'">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>   
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
