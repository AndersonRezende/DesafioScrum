<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('site/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('site/style.css') }}" rel="stylesheet">
    <script src="{{ asset('site/jquery.js') }}"></script>
    <script src="{{ asset('site/bootstrap.js') }}"></script>
    <script src="{{ asset('site/flash.js') }}"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <a class="navbar-brand mr-auto mr-lg-0" href="#">{{ config('app.name', 'Laravel') }}</a>
        <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Início</a>
                </li>
                @if (Auth::user()->level->id == 1)
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.index') }}">Usuários</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('clients.index') }}">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.index') }}">Produtos</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('purchases.index') }}">Compras</a>
                </li>
            </ul>
            <div class="form-inline mt-2 mt-md-0">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="text-dark" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @if(session('status'))
    <div class="row">
        <div class="col-sm-10 col-md-10">
        </div>
        <div class="col-sm-2 col-md-2">
            <div class="alert alert-success" id="flash-msg">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="alert-heading">Sucesso!</h4>
                <hr>
                {{ session('status') }}
            </div>
        </div>
    </div>
    @endif

    @if($errors->all())

    <div class="row">
        <div class="col-sm-10 col-md-10">
        </div>
        <div class="col-sm-2 col-md-2">
            <div class="alert alert-danger" id="flash-msg">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="alert-heading">Erro!</h4>
                <hr>
                @foreach($errors->all() as $error)
                {{ $error }}
                <br>
                @endforeach
            </div>
        </div>
    </div>

    @endif

    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>
</div>
</body>
</html>
