<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <title>Leis Municipais</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script src="https://kit.fontawesome.com/66c16fc52c.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="logo">
                <a href="#" class="simple-text logo-normal">
                    Leis Municipais
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}">
                            <i class="fa-solid fa-gauge" style="font-size: 15px;"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    @if (Auth::user()->perfil == 1)
                        <li
                            class="{{ request()->routeIs('listagem.indicacao') || request()->routeIs('cadastro.indicacao') ? 'active' : '' }}">
                            <a href="{{ route('listagem.indicacao') }}">
                                <i class="fa-solid fa-gavel" style="font-size: 15px;"></i>
                                <p>Indicação</p>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->perfil == 1)
                        <li
                            class="{{ request()->routeIs('listagem.vereadores') || request()->routeIs('cadastro.vereadores') ? 'active' : '' }}">
                            <a href="{{ route('listagem.vereadores') }}">
                                <i class="fa-solid fa-user" style="font-size: 15px;"></i>
                                <p>Vereadores</p>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->perfil == 1)
                        <li class="{{ request()->routeIs('usuarios.list') ? 'active' : '' }}">
                            <a href="{{ route('usuarios.list') }}">
                                <i class="fa-solid fa-users" style="font-size: 15px;"></i>
                                <p>Usuarios</p>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->perfil == 1)
                        <li
                            class="{{ request()->routeIs('sessao.historico') || request()->routeIs('sessao.cadastro') ? 'active' : '' }}">
                            <a href="{{ route('sessao.historico') }}">
                                <i class="fa-solid fa-right-to-bracket" style="font-size: 15px;"></i>
                                <p>Sessões</p>
                            </a>
                        </li>
                    @endif
                    <li
                        class="{{ request()->routeIs('listagem.projetos') || request()->routeIs('cadastro.projetos') ? 'active' : '' }}">
                        <a href="{{ route('listagem.projetos') }}">
                            <i class="fa-solid fa-book" style="font-size: 15px;"></i>
                            <p>Projetos</p>
                        </a>
                    </li>
                    <li
                        class="{{ request()->routeIs('tribuna.list') || request()->routeIs('tribuna.cadastro') ? 'active' : '' }}">
                        <a href="{{ route('tribuna.list') }}">
                            <i class="fa-solid fa-microphone" style="font-size: 15px;"></i>
                            <p>Uso da Tribuna</p>
                        </a>
                    </li>
                    @if (Auth::user()->perfil == 1)
                        <li
                            class="{{ request()->routeIs('tribuna.solicitacoes') || request()->routeIs('tribuna.ambiente') ? 'active' : '' }}">
                            <a href="{{ route('tribuna.solicitacoes') }}">
                                <i class="fa-solid fa-pen" style="font-size: 15px;"></i>
                                <p>Solicitações Tribuna</p>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav">
                            <li class="nav-item btn-rotate dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <p>Olá, {{ Auth::user()->name }}</p> &nbsp;&nbsp;<i class="fa-solid fa-user"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="{{ route('alterar.senha') }}">Alterar a
                                        senha</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}">Sair</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content">
                @if (session('message-success-encerrar-votacao'))
                    <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" aria-hidden="true" class="close" data-dismiss="alert"
                                aria-label="Close">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                            <span class="span-alert">{{ session('message-success-encerrar-votacao') }}</span>
                        </div>
                    </div>
                @endif
                @if (session('message-success-votacao-concluida'))
                    <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" aria-hidden="true" class="close" data-dismiss="alert"
                                aria-label="Close">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                            <span class="span-alert">{{ session('message-success-votacao-concluida') }}</span>
                        </div>
                    </div>
                @endif
                @yield('content')
            </div>
            <footer class="footer footer-black  footer-white ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="credits ml-auto">
                            <span class="copyright">
                                iGtech Soluções ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>
                            </span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-notify.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json"></script>
    <script>
        $(document).ready(function() {
            $('#table-listagens').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json"
                }
            });
        });
    </script>
</body>

</html>
