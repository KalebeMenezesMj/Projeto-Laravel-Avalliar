 @extends('template')
@section('titulo', 'login')

@section('conteudo')

<body>
    <style>
   
    :root {
        --cor-primaria: #2563eb;
        --cor-primaria-hover: #1d4ed8;
        --cor-fundo: #f3f4f6;
        --cor-texto-principal: #1f2937;
        --cor-texto-secundario: #374151;
        --cor-borda: #d1d5db;
        --cor-sombra: rgba(0, 0, 0, 0.1);
        --cor-foco-sombra: rgba(59, 130, 246, 0.3);
    }


    .container {
        min-height: 80vh; 
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: var(--cor-fundo);
        background-image: linear-gradient(170deg, #f3f4f6 0%, #e5e7eb 100%);
        padding: 40px 20px;
    }


    .form-box {
        background-color: white;
        padding: 2.5rem; 
        border-radius: 1rem;
        box-shadow: 0 4px 6px -1px var(--cor-sombra), 0 2px 4px -2px var(--cor-sombra);
        width: 100%;
        max-width: 420px;
        border: 1px solid #e5e7eb;
    }

    .form-box h2 {
        text-align: center;
        color: var(--cor-texto-principal);
        margin-bottom: 2rem;
        font-size: 1.75rem;
    }

    
    label {
        display: block;
        margin-bottom: 0.5rem;
        color: var(--cor-texto-secundario);
        font-weight: 600; 
    }

    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 0.85rem;
        border: 1px solid var(--cor-borda);
        border-radius: 0.5rem;
        margin-bottom: 1.25rem;
        box-sizing: border-box;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }

    input[type="email"]:focus,
    input[type="password"]:focus {
        border-color: var(--cor-primaria);
        outline: none;
        box-shadow: 0 0 0 3px var(--cor-foco-sombra);
    }

    .form-button {
        width: 100%;
        padding: 0.85rem;
        background-color: var(--cor-primaria);
        color: white;
        border: none;
        border-radius: 0.5rem;
        cursor: pointer;
        font-weight: bold;
        font-size: 1rem;
        transition: background-color 0.2s ease, transform 0.2s ease;
    }

    .form-button:hover {
        background-color: var(--cor-primaria-hover);
        transform: translateY(-2px);
    }
</style>

<main class="container">
    <div class="form-box">
        <h2>Área Restrita</h2>
        <form action="/logar" method="POST">
            @csrf
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" placeholder="seu.email@exemplo.com" required>

            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" placeholder="••••••••" required>

            <input type="submit" value="Entrar" class="form-button">
        </form>
    </div>
</main>

</body>

@endsection