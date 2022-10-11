<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <title>
        Login | Leis Municipais
    </title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/66c16fc52c.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <style>
        .main-panel {
            width: 100% !important;
            background: #0260c5 !important;
        }

        .text-secondary {
            color: #ffffff !important;
        }

        body {
            overflow: hidden !important;
        }
    </style>
</head>

<body>
    <div class="main-panel col-md-12">
        <div class="content">
            @yield('content')
        </div>
        <footer class="footer py-5">
            <div class="container">
                <div class="row">
                    <div class="col-8 mx-auto text-center mt-1">
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
