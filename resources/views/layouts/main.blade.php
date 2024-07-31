<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Importa a fonte Google Rubik -->
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">
    
    <!-- Importa o Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Importa os ícones do Ionicons -->
    <link href="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.css" rel="stylesheet">
    
    <!-- Inclui o CSS personalizado -->
    <link rel="stylesheet" href="/css/styles.css">
    
    <!-- Inclui o JavaScript -->
    <script src="/js/scripts.js" defer></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbar">
                <a href="/" class="navbar-brand">
                    <ion-icon name="build-outline" size="large"></ion-icon>
                </a>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="/events/create" class="nav-link">Agendamento</a>
                    </li>
                    <li class="nav-item">
                        <a href="/equipamentos" class="nav-link">Ferramentas</a>
                    </li>
                    <li class="nav-item">
                        <a href="/contact" class="nav-link">Contato</a>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-right">
                    @auth
                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link">Calendário de Manutenções</a>
                    </li>
                    <li class="nav-item">
    <form action="/logout" method="POST">
        @csrf
        <a href="#" class="nav-link" onclick="event.preventDefault();this.closest('form').submit();">Sair</a>
    </form>
</li>
                    @endauth
                    @guest
                    <li class="nav-item">
                        <a href="/login" class="nav-link">Entrar</a>
                    </li>
                    <li class="nav-item">
                        <a href="/register" class="nav-link">Cadastrar</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </header>
    
    <!-- Mensagem de sessão -->
    <div class="container-fluid">
        @if(session("msg"))
            @if(session("msg_type") == "success")
                <p class="msg msg-success">{{ session("msg") }}</p>
            @elseif(session("msg_type") == "failure")
                <p class="msg msg-failure">{{ session("msg") }}</p>
            @endif
        @endif
    </div>

    <!-- Conteúdo principal -->
    <main>
        <div class="container-fluid">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </main>
    
    <!-- Rodapé -->
    <footer class="footer mt-auto py-3">
        <div class="container text-center">
            <p>UpKeep Maintenance! &copy; - Todos os direitos reservados!</p>
        </div>
    </footer>

    <!-- Inclui o Bootstrap JavaScript e dependências -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <!-- Inclui o Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>