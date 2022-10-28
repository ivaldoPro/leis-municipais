@extends('components.app-site')
@section('content')
    <section class="page-section bg-light">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Biografia</h2>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="team-member">
                        @if ($vereador->imagem)
                            <img class="mx-auto rounded" src="{{ url('/img/events/' . $vereador->imagem) }}">
                        @else
                            <img class="mx-auto rounded"src="{{ url('/img/user-not-found.png') }}">
                        @endif
                        <h4>{{ $vereador->nome }}</h4>
                        <p class="text-muted">{{ $vereador->cargo }}, {{ $vereador->partido }}</p>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-4">
                    @if ($vereador->biografia)
                        <p class="biografia">{{ $vereador->biografia }}</p>
                    @else
                        <h5 class="biografia">{{ $vereador->cargo }} sem biografia.</h5>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <h3 class="section-heading text-uppercase">Indicações do Vereador</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table" id="table-projetos-indicados">
                            <thead>
                                <th>Número</th>
                                <th>Título</th>
                                <th>Autor</th>
                                <th>Categoria</th>
                                <th>Documento</th>
                                <th>Ano</th>
                            </thead>
                            <tbody>
                                @foreach ($listProjetosIndicados as $projeto)
                                    <tr>
                                        <td>{{ $projeto->numero }}</td>
                                        <td>{{ $projeto->titulo }}</td>
                                        <td>{{ $projeto->nomeVereador }}</td>
                                        <td>{{ $projeto->nomeCategoria }}</td>
                                        <td>
                                            @if ($projeto->documento)
                                                <a href="{{ url('/arquivos/documentos/' . $projeto->documento) }}"
                                                    target="_blank">Documento</a>
                                            @else
                                                Nenhum documento foi anexado
                                            @endif
                                        </td>
                                        <td>{{ $projeto->ano }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
