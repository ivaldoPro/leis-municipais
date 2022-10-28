@extends('components.app-ambiente')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Falando agora: {{ $vereador->nome }}, {{ $vereador->partido }}</h1>
            <h2 class="card-title">Motivo: {{ $infoTribuna->motivo }}</h2>
            <div class="col-md-12">
                <div
                    class="col-xl-12 offset-xl-5 col-lg-12 offset-lg-4 col-md-12 offset-md-4 col-sm-12 offset-sm-2 col-xs-12">
                    <ul class="polaroids">
                        <li>
                            @if ($vereador->imagem)
                                <img src="{{ url('/img/events/' . $vereador->imagem) }}">
                            @else
                                <img src="{{ url('/img/user-not-found.png') }}">
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <div class="col-xl-12 offset-xl-5 col-lg-12 offset-lg-5 col-md-12 offset-md-5 col-sm-12">
                    <h1 class="time"></h1>
                </div>
            </div>

        </div>
    </div>
    <script>
        function startTimer(duration, display) {
            var timer = duration,
                minutes, seconds;

            setInterval(function() {
                minutes = parseInt(timer / 60, 10)
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    timer = duration;
                }
                if (timer == 0) {
                    window.close();
                }
            }, 1000);
        }

        window.onload = function() {
            var minutes = 60 * 10,
                display = document.querySelector('.time');
            startTimer(minutes, display);
        };
    </script>
</div>
