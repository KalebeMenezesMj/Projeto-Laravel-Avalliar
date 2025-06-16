<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo') | Avalliar Engenharia</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
<style>
        body {
            margin: 0;
            font-family: 'Montserrat', sans-serif;
            color: #333;
            line-height: 1.6;
            background-color: #f4f4f4; /* Light background for the form section */
        }

        .header {
            background-color: #e53935;
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #fff;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            height: 50px;
            margin-right: 10px;
            margin-left: 20px;
        }

        .logo span {
            font-size: 1.5em;
            font-weight: 700;
        }

        .navigation {
            display: flex;
            gap: 20px;
        }

        .navigation a {
            color: #fff;
            text-decoration: none;
            font-weight: 700;
        }

        .hero {
            position: relative;
            height: 500px;
            overflow: hidden;
            display: flex;
        }

        .hero-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: grayscale(80%);
        }

        .hero-content-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 50%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            background-color: rgba(0, 0, 0, 0.6);
            padding: 40px;
            z-index: 1;
        }

        .hero-title {
            font-size: 3em;
            font-weight: 700;
            margin-bottom: 10px;
            color: #fff;
        }

        .hero-subtitle {
            font-size: 2em;
            font-weight: 400;
            margin-bottom: 20px;
            color: #fff;
        }

        .hero-button {
            background-color: #fff;
            color: #e53935;
            border: none;
            padding: 15px 30px;
            border-radius: 5px;
            font-size: 1.2em;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .hero-button:hover {
            background-color: #f0f0f0;
        }

        .quem-somos {
            padding: 80px 40px;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 60px;
        }

        .quem-somos-text {
            max-width: 50%;
        }

        .quem-somos-title {
            font-size: 2.5em;
            font-weight: 700;
            color: #e53935;
            margin-bottom: 20px;
            text-align: center;
        }

        .quem-somos-paragraph {
            margin-bottom: 15px;
            color: #555;
        }

        .quem-somos-image {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            border: 4px solid #e53935;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ffffff;
        }

        .quem-somos-image img {
            max-width: 70%;
            max-height: 70%;
        }

        .o-que-fazemos {
            padding: 80px 40px;
            background-color: #222;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 60px;
        }

        .o-que-fazemos-text {
            max-width: 50%;
        }

        .o-que-fazemos-title {
            font-size: 2.5em;
            font-weight: 700;
            color: #e53935;
            margin-bottom: 20px;
            text-align: center;
        }

        .o-que-fazemos-paragraph {
            margin-bottom: 15px;
            color: #ddd;
        }

        .o-que-fazemos-image {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            border: 4px solid #e53935;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ffffff;
        }

        .o-que-fazemos-image img {
            max-width: 70%;
            max-height: 70%;
            filter: invert(0%);
        }

        .formulario-section {
            padding: 80px 40px;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .formulario-container {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
        }

        .formulario-title {
            font-size: 2.5em;
            font-weight: 700;
            color: #e53935;
            margin-bottom: 30px;
            text-align: center;
        }

        .formulario-group {
            margin-bottom: 20px;
        }

        .formulario-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }

        .formulario-group input[type="text"],
        .formulario-group input[type="email"],
        .formulario-group input[type="tel"],
        .formulario-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
            box-sizing: border-box;
        }

        .formulario-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .formulario-button {
            background-color: #e53935;
            color: #fff;
            border: none;
            padding: 15px 30px;
            border-radius: 5px;
            font-size: 1.2em;
            font-weight: 700;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .formulario-button:hover {
            background-color: #c82e2b;
        }

        .footer {
            background-color: #222;
            color: #fff;
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .footer-logo {
            width: 80px;
            margin-bottom: 20px;
        }

        .footer-copyright {
            font-size: 0.9em;
            color: #aaa;
        }
    </style>    @yield('estilos') 
</head>
<body>
    <header style="background-color: #e53935; padding: 20px 30px; display: flex; justify-content: space-between; align-items: center; color: #fff; font-family: 'Montserrat', sans-serif;">
        <div class="logo">
            <a href="/"><img src="{{ asset('imgs/MARCA DAGUA BRANCO 1.png') }}" alt="Logo Avalliar" style="height: 50px;"></a>
        </div>
        <nav class="navigation" style="display: flex; gap: 20px; align-items: center;">
            
            @if (Session::has('usuario_id'))
                <a href="/dashboard" style="color: #fff; text-decoration: none; font-weight: 700;">Dashboard</a>
                <span style="color: rgba(255,255,255,0.5);">|</span>
                <a href="/painel-de-controle">Painel de Controle</a>
                <span style="color: rgba(255,255,255,0.5);">|</span>
                <a href="/produtos" style="color: #fff; text-decoration: none; font-weight: 700;">Demandas</a>
                <span style="color: rgba(255,255,255,0.5);">|</span>
                <a href="/usuarios" style="color: #fff; text-decoration: none; font-weight: 700;">Usuários</a>
                <span style="color: rgba(255,255,255,0.5);">|</span>
                <a href="/logout" style="color: #fff; text-decoration: none; font-weight: 700;">Logout</a>
            @else
                <a href="/#sobre" style="color: #fff; text-decoration: none; font-weight: 700;">Sobre Nós</a>
                <span style="color: rgba(255,255,255,0.5);">|</span>
                <a href="/#formulario" style="color: #fff; text-decoration: none; font-weight: 700;">Formulário</a>
                <span style="color: rgba(255,255,255,0.5);">|</span>
                <a href="/frmlogin" style="color: #fff; text-decoration: none; font-weight: 700;">Login</a>
                <span style="color: rgba(255,255,255,0.5);">|</span>
                <a href="/frmusuario" style="color: #fff; text-decoration: none; font-weight: 700;">Cadastro</a>
            @endif


        </nav>
    </header>
    
    <main>
        @yield('conteudo')
    </main>

</body>
</html>