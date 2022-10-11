<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <title>
        Ambiente | Leis Municipais
    </title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/66c16fc52c.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <style>
        .main-panel {
            width: 100% !important;
        }

        body {
            overflow-x: hidden !important;
        }
    </style>
</head>

<body>
    <div class="col-md-12">
        <div class="content">
            @yield('content')
        </div>
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div
                        class="col-xl-12 offset-xl-1 col-lg-12 offset-lg-1 col-md-12 offset-md-1 col-sm-12 offset-sm-1 col-xs-12 text-center">
                        <p class="mb-0 text-secondary">
                            iGtech Soluções ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
