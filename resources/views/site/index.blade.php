@extends('components.app-site')
@section('content')
    <section class="page-section bg-light" id="vereadores">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Vereadores</h2>
            </div>
            <br><br>
            <div class="row">
                <label>Filtrar por município</label>
                <form class="form-inline" action="{{ route('filtrar.vereadores') }}" method="get">
                    <select class="form-control col-md-4" id="municipio" name="municipio" required>
                        <option value="0">Selecione</option>
                        @foreach ($listMunicipios as $municipio)
                            <option value="{{ $municipio->id }}">{{ $municipio->municipio }},
                                {{ $municipio->uf }}
                            </option>
                        @endforeach
                    </select>
                    <button class="btn btn-success"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <br><br>
            <div class="row">
                @if ($listVereadores->count() > 0)
                    @foreach ($listVereadores as $vereador)
                        <div class="col-lg-4">
                            <div class="team-member">
                                @if ($vereador->imagem)
                                    <img class="mx-auto rounded" src="{{ url('/img/events/' . $vereador->imagem) }}">
                                @else
                                    <img class="mx-auto rounded"src="{{ url('/img/user-not-found.png') }}">
                                @endif
                                <h4>{{ $vereador->nome }}</h4>
                                <p class="text-muted text-uppercase">{{ $vereador->cargo }}, {{ $vereador->partido }}</p>
                                <p class="text-muted text-uppercase">{{ $vereador->descricaoMunicipio }}</p>
                                <hr>
                                <a class="btn btn-success btn-xl text-uppercase a-button"
                                    href="{{ route('biografia.vereadores', $vereador->id) }}">Biografia</a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <label class="text-muted text-center text-uppercase">Nenhum vereador foi encontrado para essa
                        cidade.</label>
                @endif
            </div>
        </div>
    </section>
@endsection
