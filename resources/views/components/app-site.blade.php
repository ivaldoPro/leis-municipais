<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Câmara Municípal</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link href="{{ asset('css/site.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
</head>

<body id="home">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="{{ route('site') }}"><img src="{{ asset('img/logo.png') }}"
                    alt="..." /></a> <a style="text-decoration: none;">Câmara Municípal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ route('site') }}">Home</a></li>

                    <li class="nav-item"><a class="nav-link" href="{{ route('leis.municipais') }}">Leis</a></li>

                    @if (request()->routeIs('site'))
                        <li class="nav-item"><a class="nav-link" href="#vereadores">Vereadores</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('site') }}#vereadores">Vereadores</a>
                        </li>
                    @endif

                    <li class="nav-item"><a class="nav-link" href="{{ route('get.indicacoes') }}">Indicações</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead">
    </header>
    @yield('content')
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 my-3 my-lg-0 text-lg-center">iGtech Soluções ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/site.js') }}"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json"></script>
    <script>
        $(document).ready(function() {
            $('#table-listagens-indicacoes').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json"
                }
            });

            $('#table-listagens-projeto').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json"
                }
            });

            $('#table-leis-indicadas').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json"
                }
            });

            $('#table-projetos-indicados').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json"
                }
            });

            $('#table-projetos-leis-municipais').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json"
                }
            });

            $('#table-listagens-leis-organicas').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json"
                }
            });

            $('#table-listagens-regimento-interno').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json"
                }
            });
        });
    </script>
</body>

</html>
