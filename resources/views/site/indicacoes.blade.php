@extends('components.app-site')
@section('content')
    <section class="page-section bg-light" id="indicacoes">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Indicações</h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table" id="table-listagens-projeto">
                            <thead>
                                <th>Data da Votação</th>
                                <th>Sessão</th>
                                <th>Número</th>
                                <th>Título</th>
                                <th>Autor</th>
                                <th>Categoria</th>
                                <th>Documento</th>
                                <th>Ano</th>
                                <th>Município</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                @foreach ($projetos as $projeto)
                                    <tr>
                                        <td>{{ date('d/m/Y', strtotime($projeto->dataVotacao)) }}</td>
                                        <td>{{ $projeto->nomeSessao }}</td>
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
                                        <td>{{ $projeto->descricaoMunicipio }}</td>
                                        <td class="up-text">
                                            @if ($projeto->status == 1)
                                                <span class="badge badge-success">{{ $projeto->descricaoStatus }}</span>
                                            @else
                                                <span class="badge badge-danger">{{ $projeto->descricaoStatus }}</span>
                                            @endif
                                        </td>
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
