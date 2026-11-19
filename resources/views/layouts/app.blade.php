<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo', 'Pessoas') - CRUD</title>
    {{-- Bootstrap 5 por CDN: usamos só o CSS, nenhum JavaScript --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar bg-dark mb-4" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">CRUD de Pessoas</a>
            <div class="d-flex align-items-center gap-3">
                @auth
                <span class="text-white-50 small">
                    {{ Auth::user()->name }}
                    <span class="badge text-bg-{{ Auth::user()->isAdmin() ? 'danger' : 'secondary' }}">
                        {{ Auth::user()->isAdmin() ? 'Admin' : 'Comum' }}
                    </span>
                </span>
                {{-- Logout é POST: não pode ser um link simples --}}
                <form method="POST" action="{{ url('/logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm">Sair</button>
                </form>
                @else
                <a class="btn btn-outline-light btn-sm" href="{{ url('/login') }}">Entrar</a>
                <a class="btn btn-light btn-sm" href="{{ url('/register') }}">Cadastrar</a>
                @endauth
            </div>
        </div>
    </nav>
    <main class="container pb-5">
        {{-- Mensagem de sucesso enviada pelos controllers com ->with('sucesso', ...) --}}
        @if (session('sucesso'))
        <div class="alert alert-success">{{ session('sucesso') }}</div>
        @endif
        @yield('conteudo')
    </main>
</body>

</html>