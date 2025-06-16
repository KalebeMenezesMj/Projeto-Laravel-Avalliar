<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Usuario;
use App\Models\Demanda;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Contato;


class AppController extends Controller
{
    public function home()
    {

        return view('home');
    }

    public function sobre()
    {

        return view('sobre');
    }

    public function contato()
    {

        return view('contato');
    }

    //AUTENTICAÇÃO
    public function frmlogin()
    {
        return view('frmlogin');
    }

    public function logar(Request $request)
    {
        $user = Usuario::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->senha, $user->senha)) {
            return redirect('/frmlogin')->with('erro', 'Email ou senha inválidos.');
        }
        Session::put('usuario_id', $user->id);
        Session::put('usuario_nome', $user->nome);
        return redirect('/dashboard');
    }

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }


    public function dashboard()
    {
        if (!Session::has('usuario_id')) {

            return redirect('/frmlogin');
        }
        return view('dashboard');
    }

    public function painelDeControle()
    {
        if (!Session::has('usuario_id')) {

            return redirect('/frmlogin');
        }
        $totalDemandas = Demanda::count();
        $demandasPendentes = Demanda::where('status', 'Aguardando Agendamento')->count();
        $totalUsuarios = Usuario::count();
        $ultimasDemandas = Demanda::latest()->take(5)->get();

        return view('paineldecontrole', [
            'totalDemandas' => $totalDemandas,
            'demandasPendentes' => $demandasPendentes,
            'totalUsuarios' => $totalUsuarios,
            'ultimasDemandas' => $ultimasDemandas,
        ]);
    }

    //DEMANDAS
    public function demandas()
    {
        if (!Session::has('usuario_id')) {

            return redirect('/frmlogin');
        }
        $demandas = Demanda::latest()->get();
        return view('produtos', ['demandas' => $demandas]);
    }

    public function frmdemanda()
    {
        if (!Session::has('usuario_id')) {

            return redirect('/frmlogin');
        }
        return view('frmproduto');
    }

    public function adddemanda(Request $request)
    {
        if (!Session::has('usuario_id')) {

            return redirect('/frmlogin');
        }
        $demanda = new Demanda();
        $this->preencherDadosDemanda($demanda, $request);
        $demanda->save();
        return redirect('/produtos')->with('sucesso', 'Demanda cadastrada com sucesso!');
    }

    public function frmeditdemanda($id)
    {
        if (!Session::has('usuario_id')) {

            return redirect('/frmlogin');
        }
        $demanda = Demanda::findOrFail($id);
        return view('frmeditdemanda', ['demanda' => $demanda]);
    }

    public function atualizardemanda(Request $request, $id)
    {
        if (!Session::has('usuario_id')) {

            return redirect('/frmlogin');
        }
        $demanda = Demanda::findOrFail($id);
        $this->preencherDadosDemanda($demanda, $request);
        $demanda->save();
        return redirect('/produtos')->with('sucesso', 'Demanda atualizada com sucesso!');
    }

    public function excluirdemanda($id)
    {
        if (!Session::has('usuario_id')) {

            return redirect('/frmlogin');
        }
        $demanda = Demanda::findOrFail($id);
        $demanda->delete();
        return redirect('/produtos')->with('sucesso', 'Demanda excluída com sucesso!');
    }

    //USUÁRIOS
    public function usuarios()
    {
        if (!Session::has('usuario_id')) {

            return redirect('/frmlogin');
        }
        $usuarios = Usuario::all();
        return view('usuarios', ['users' => $usuarios]);
    }

    public function frmusuario()
    {
        return view('frmusuario');
    }

    public function addusuario(Request $request)
    {
        $usuario = new Usuario();
        $usuario->nome = $request->fnome;
        $usuario->email = $request->femail;
        $usuario->senha = Hash::make($request->fsenha);
        $usuario->save();
        return redirect('/frmlogin')->with('sucesso', 'Usuário cadastrado! Pode fazer o login.');
    }
    public function frmeditusuario($id)
    {
        if (!Session::has('usuario_id')) {

            return redirect('/frmlogin');
        }
        $usuario = Usuario::findOrFail($id);
        return view('frmeditusuario', ['user' => $usuario]);
    }

    public function atualizarusuario(Request $request, $id)
    {
        if (!Session::has('usuario_id')) {

            return redirect('/frmlogin');
        }
        $usuario = Usuario::findOrFail($id);
        $dados = ['nome' => $request->fnome, 'email' => $request->femail];
        if (!empty($request->fsenha)) {
            $dados['senha'] = Hash::make($request->fsenha);
        }
        $usuario->update($dados);
        return redirect('/usuarios');
    }

    public function excluirusuario($id)
    {
        if (!Session::has('usuario_id')) {

            return redirect('/frmlogin');
        }
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return redirect('/usuarios');
    }

    //PRODUTOS
    public function frmproduto()
    {
        if (!Session::has('usuario_id')) {

            return redirect('/frmlogin');
        }
        return view('frmproduto');
    }
    public function addproduto(Request $request)
    {
        if (!Session::has('usuario_id')) {

            return redirect('/frmlogin');
        }
        $prod = new Produto();
        $prod->nome = $request->nome;
        $prod->preco = $request->preco;
        $prod->quantidade = $request->quantidade;
        if ($request->hasFile('imagem')) {
            $path = $request->file('imagem')->store('imagens', 'public');
            $prod->imagem = $path;
        }
        $prod->save();
        return redirect('/produtos');
    }

    private function preencherDadosDemanda(Demanda $demanda, Request $request)
    {
        $demanda->nome_cliente = $request->nome_cliente;
        $demanda->empresa_contratante = $request->empresa_contratante;
        $demanda->endereco = $request->endereco;
        $demanda->engenheiro_responsavel = $request->engenheiro_responsavel;
        $demanda->contato_vistoria = $request->contato_vistoria;
        $demanda->data_abertura = $request->data_abertura;
        if ($request->has('status')) {
            $demanda->status = $request->status;
        }
    }

    //contato
    public function salvarContato(Request $request)
    {
        Contato::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'assunto' => $request->assunto,
            'mensagem' => $request->mensagem,
        ]);

        return redirect('/#formulario');
    }

    public function listarContatos()
    {
        if (!Session::has('usuario_id')) {
            return redirect('/frmlogin');
        }

        $contatos = Contato::latest()->get();
        return view('contatos', ['contatos' => $contatos]);
    }

    public function excluirContato($id)
    {
        if (!Session::has('usuario_id')) {
            return redirect('/frmlogin');
        }

        $contato = Contato::findOrFail($id);
        $contato->delete();
        return redirect('/contatos')->with('sucesso_contato', 'Mensagem excluída.');
    }
}
