<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo') | Avalliar Engenharia</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="header">
        <div class="logo">
            <a href="/"><img src="{{ asset('imgs/MARCA DAGUA BRANCO 1.png') }}" alt="Logo Avalliar"></a>
        </div>
        
        <nav class="navigation-wrapper">
            <button class="hamburger-menu" aria-label="Abrir Menu">
                &#9776; 
            </button>
            <div class="navigation-links" id="main-nav">
                @if (Session::has('usuario_id'))
                    <a href="/dashboard">Dashboard</a>
                    <a href="/painel-de-controle">Painel de Controle</a>
                    <a href="/produtos">Demandas</a>
                    <a href="/usuarios">Usuários</a>
                    <a href="/logout">Logout</a>
                @else
                    <a href="/#sobre">Sobre Nós</a>
                    <a href="/#formulario">Formulário</a>
                    <a href="/frmlogin">Login</a>
                    <a href="/frmusuario">Cadastro</a>
                @endif
            </div>
        </nav>
    </header>
    
    <main>
        @yield('conteudo')
    </main>

    <footer class="footer">
        <img src="{{ asset('imgs/MARCA DAGUA BRANCO 2.png') }}" alt="Logo Avalliar Footer" class="footer-logo">
        <p class="footer-copyright">@2025 Avalliar - All Copyrights Reserved</p>
    </footer>

    <script>
        const hamburgerButton = document.querySelector('.hamburger-menu');
        const navMenu = document.querySelector('#main-nav');

        hamburgerButton.addEventListener('click', () => {
            navMenu.classList.toggle('is-active');
        });
    </script>
</body>
</html>