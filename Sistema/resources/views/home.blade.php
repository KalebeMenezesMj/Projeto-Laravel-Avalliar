@extends('template')
@section('titulo', 'Home')

@section('navbar')
    {{-- <a href="#sobre">Sobre Nós</a>
    <span>|</span>
    <a href="#formulario">Formulário</a>
    <span>|</span> --}}
     <a href="frmlogin">Login</a>
    <span>|</span>
    <a href="frmusuario">Cadastro</a>
    <span>|</span>
@endsection

@section('conteudo')

<style>
    .hero { position: relative; height: 500px; overflow: hidden; display: flex; }
    .hero-image { position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; filter: grayscale(80%); }
    .hero-content-container { position: absolute; top: 0; left: 0; width: 50%; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: flex-start; background-color: rgba(0, 0, 0, 0.6); padding: 40px; z-index: 1; }
    .hero-title { font-size: 3em; font-weight: 700; margin-bottom: 10px; color: #fff; }
    .hero-subtitle { font-size: 2em; font-weight: 400; margin-bottom: 20px; color: #fff; }
    .hero-button { background-color: #fff; color: #e53935; border: none; padding: 15px 30px; border-radius: 5px; font-size: 1.2em; font-weight: 700; text-decoration: none; cursor: pointer; transition: background-color 0.3s ease; }
    .hero-button:hover { background-color: #f0f0f0; }
    .quem-somos { padding: 80px 40px; background-color: #f7f7f7; display: flex; justify-content: center; align-items: center; gap: 60px; flex-wrap: wrap; }
    .quem-somos-text { max-width: 50%; min-width: 300px;}
    .quem-somos-title { font-size: 2.5em; font-weight: 700; color: #e53935; margin-bottom: 20px; text-align: center; }
    .quem-somos-paragraph { margin-bottom: 15px; color: #555; }
    .quem-somos-image { width: 200px; height: 200px; border-radius: 50%; border: 4px solid #e53935; display: flex; justify-content: center; align-items: center; background-color: #ffffff; }
    .quem-somos-image img { max-width: 70%; max-height: 70%; }
    .o-que-fazemos { padding: 80px 40px; background-color: #222; color: #fff; display: flex; justify-content: center; align-items: center; gap: 60px; flex-wrap: wrap; }
    .o-que-fazemos-text { max-width: 50%; min-width: 300px; }
    .o-que-fazemos-title { font-size: 2.5em; font-weight: 700; color: #e53935; margin-bottom: 20px; text-align: center; }
    .o-que-fazemos-paragraph { margin-bottom: 15px; color: #ddd; }
    .o-que-fazemos-image { width: 200px; height: 200px; border-radius: 50%; border: 4px solid #e53935; display: flex; justify-content: center; align-items: center; background-color: #ffffff; }
    .o-que-fazemos-image img { max-width: 70%; max-height: 70%; }
    .formulario-section { padding: 80px 40px; background-color: #f4f4f4; display: flex; flex-direction: column; align-items: center; }
    .formulario-container { background-color: #fff; padding: 40px; border-radius: 10px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); width: 80%; max-width: 600px; }
    .formulario-title { font-size: 2.5em; font-weight: 700; color: #e53935; margin-bottom: 30px; text-align: center; }
    .formulario-group { margin-bottom: 20px; }
    .formulario-group label { display: block; margin-bottom: 5px; color: #555; font-weight: bold; }
    .formulario-group input, .formulario-group textarea { width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 5px; font-size: 1em; box-sizing: border-box; }
    .formulario-group textarea { resize: vertical; min-height: 100px; }
    .formulario-button { background-color: #e53935; color: #fff; border: none; padding: 15px 30px; border-radius: 5px; font-size: 1.2em; font-weight: 700; cursor: pointer; transition: background-color 0.3s ease; }
    .formulario-button:hover { background-color: #c82e2b; }
    .footer { background-color: #222; color: #fff; padding: 40px; text-align: center; }
    .footer-logo { width: 80px; margin-bottom: 20px; }
    .footer-copyright { font-size: 0.9em; color: #aaa; }
    
    .team-section {
        padding: 60px 40px;
        text-align: center;
        background-color: #fff; 
        border-top: 1px solid #e5e7eb;
    }
    .team-section h2 {
        font-size: 2.5em;
        font-weight: 700;
        color: #e53935;
        margin-bottom: 30px;
    }
    .team-grid {
        display: flex;
        justify-content: center;
        gap: 40px;
        flex-wrap: wrap;
    }
    .team-member {
        flex-basis: 220px;
        text-align: center;
    }
    .team-member .profile-pic {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        border: 4px solid #e53935;
    }
    .team-member h3 {
        margin: 0 0 5px 0;
        font-size: 1.25rem;
        color: #1f2937;
    }
    .team-member p {
        margin: 0;
        color: #6b7280;
    }
</style>

<div class="hero">
    <img src="{{ asset('imgs/predio.jpg') }}" alt="Prédio" class="hero-image">
    <div class="hero-content-container">
        <h1 class="hero-title">AVALIAÇÕES PRECISAS,</h1>
        <h2 class="hero-subtitle">DECISÕES SEGURAS.</h2>
        <a href="#formulario" class="hero-button">Solicite um Orçamento</a>
    </div>
</div>

<section class="quem-somos" id="sobre">
    <div class="quem-somos-text">
        <h2 class="quem-somos-title">QUEM SOMOS</h2>
        <p class="quem-somos-paragraph">Na Avalliar Engenharia, unimos tradição e inovação para oferecer as mais precisas e confiáveis avaliações de imóveis do mercado. Com uma equipe de engenheiros altamente qualificados e comprometidos com a excelência, garantimos laudos técnicos detalhados que servem como pilar para decisões estratégicas.</p>
        <p class="quem-somos-paragraph">Nossa trajetória é marcada pela integridade e pela busca contínua por métodos que assegurem resultados imparciais e fundamentados.</p>
    </div>
    <div class="quem-somos-image">
        <img src="{{ asset('imgs/ICONE 1.png') }}" alt="Aperto de mãos simbolizando parceria">
    </div>
</section>

<section class="o-que-fazemos">
    <div class="o-que-fazemos-image">
        <img src="{{ asset('imgs/ICONE 2.png') }}" alt="Polegar para cima simbolizando qualidade">
    </div>
    <div class="o-que-fazemos-text">
        <h2 class="o-que-fazemos-title">O QUE FAZEMOS</h2>
        <p class="o-que-fazemos-paragraph">Nossa expertise abrange uma gama completa de serviços de engenharia de avaliações, projetados para atender às necessidades de bancos, empresas e clientes particulares. Realizamos avaliações periciais detalhadas, elaboramos laudos técnicos e conduzimos vistorias de vizinhança.</p>
        <p class="o-que-fazemos-paragraph">Cada serviço é executado com rigor técnico e atenção aos mínimos detalhes, garantindo a segurança e a clareza que os nossos clientes precisam.</p>
    </div>
</section>

<section class="team-section" id="desenvolvedor">
    <h2>Equipe do Projeto</h2>
    <div class="team-grid">
        <div class="team-member">
            <img src="{{ asset('imgs/eu.jpg') }}" alt="Foto do Desenvolvedor" class="profile-pic">
            <h3>Kalebe Menezes</h3>
            <p>Desenvolvedor Web (prefiro back-end)</p>
        </div>
    </div>
</section>

<section class="formulario-section" id="formulario">
    <div class="formulario-container">
        <h2 class="formulario-title">FALE CONNOSCO</h2>

        @if(session('sucesso_contato'))
            <div style="background-color: #dcfce7; color: #166534; padding: 15px; border-radius: 8px; margin-bottom: 20px; text-align: center;">
                {{ session('sucesso_contato') }}
            </div>
        @endif

        <form action="/contato" method="POST">
            @csrf
            <div class="formulario-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" placeholder="Seu Nome Completo" required>
            </div>
            <div class="formulario-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="seu.email@exemplo.com" required>
            </div>
            <div class="formulario-group">
                <label for="telefone">Telefone:</label>
                <input type="tel" id="telefone" name="telefone" placeholder="(XX) XXXXX-XXXX">
            </div>
            <div class="formulario-group">
                <label for="assunto">Assunto:</label>
                <input type="text" id="assunto" name="assunto" placeholder="Sobre o que gostaria de falar?" required>
            </div>
            <div class="formulario-group">
                <label for="mensagem">Mensagem:</label>
                <textarea id="mensagem" name="mensagem" placeholder="Como podemos ajudar?" required></textarea>
            </div>
            <button type="submit" class="formulario-button">Enviar Mensagem</button>
        </form>
    </div>
</section>

<footer class="footer">
    <img src="{{ asset('imgs/MARCA DAGUA BRANCO 2.png') }}" alt="Logo Avalliar Footer" class="footer-logo">
    <p class="footer-copyright">@2025 Avalliar - All Copyrights Reserved</p>
</footer>

@endsection