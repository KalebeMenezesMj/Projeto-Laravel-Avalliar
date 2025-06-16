@extends('template')
@section('titulo', 'Nova Demanda')

@section('conteudo')

<style>
    input:focus, textarea:focus, select:focus {
        border-color: #2563eb !important;
        outline: none !important;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3) !important;
    }
    button:hover {
        background-color: #1d4ed8 !important;
        transform: translateY(-2px);
    }
</style>

<div style="display: flex; justify-content: center; align-items: center; min-height: 80vh; background-color: #f3f4f6; padding: 40px 20px;">
    
    <form action="/adddemanda" method="POST" 
          style="width: 100%; max-width: 600px; background: white; padding: 2.5rem; border-radius: 1rem; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
        
        @csrf

        <h2 style="text-align: center; color: #1f2937; margin-bottom: 2rem; font-size: 1.75rem;">
            Cadastrar Nova Demanda
        </h2>

        <div style="margin-bottom: 1.25rem;">
            <label for="nome_cliente" style="display: block; margin-bottom: 0.5rem; color: #374151; font-weight: 600;">Nome do Cliente</label>
            <input type="text" name="nome_cliente" id="nome_cliente" required 
                   style="width: 100%; padding: 0.85rem; border: 1px solid #d1d5db; border-radius: 0.5rem; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 1.25rem;">
            <label for="empresa_contratante" style="display: block; margin-bottom: 0.5rem; color: #374151; font-weight: 600;">Empresa Contratante</label>
            <input type="text" name="empresa_contratante" id="empresa_contratante" required 
                   style="width: 100%; padding: 0.85rem; border: 1px solid #d1d5db; border-radius: 0.5rem; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 1.25rem;">
            <label for="endereco" style="display: block; margin-bottom: 0.5rem; color: #374151; font-weight: 600;">Endereço Completo do Imóvel</label>
            <textarea name="endereco" id="endereco" rows="3" required 
                      style="width: 100%; padding: 0.85rem; border: 1px solid #d1d5db; border-radius: 0.5rem; box-sizing: border-box; resize: vertical;"></textarea>
        </div>

        <div style="margin-bottom: 1.25rem;">
            <label for="engenheiro_responsavel" style="display: block; margin-bottom: 0.5rem; color: #374151; font-weight: 600;">Engenheiro Responsável</label>
            <input type="text" name="engenheiro_responsavel" id="engenheiro_responsavel" required 
                   style="width: 100%; padding: 0.85rem; border: 1px solid #d1d5db; border-radius: 0.5rem; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 1.25rem;">
            <label for="contato_vistoria" style="display: block; margin-bottom: 0.5rem; color: #374151; font-weight: 600;">Contato para Vistoria (Nome e Telefone)</label>
            <input type="text" name="contato_vistoria" id="contato_vistoria" required 
                   style="width: 100%; padding: 0.85rem; border: 1px solid #d1d5db; border-radius: 0.5rem; box-sizing: border-box;">
        </div>
        
        <div style="margin-bottom: 1.25rem;">
            <label for="data_abertura" style="display: block; margin-bottom: 0.5rem; color: #374151; font-weight: 600;">Data de Abertura</label>
            <input type="date" name="data_abertura" id="data_abertura" required value="{{ date('Y-m-d') }}"
                   style="width: 100%; padding: 0.85rem; border: 1px solid #d1d5db; border-radius: 0.5rem; box-sizing: border-box;">
        </div>

        <button type="submit" 
                style="width: 100%; padding: 1rem; background-color: #2563eb; color: white; border: none; border-radius: 0.5rem; cursor: pointer; font-weight: bold; font-size: 1.1rem; margin-top: 1rem; transition: background-color 0.2s ease, transform 0.2s ease;">
            Cadastrar Demanda
        </button>
    </form>
</div>
@endsection