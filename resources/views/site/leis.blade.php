@extends('components.app-site')
@section('content')
    <section class="page-section bg-light">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Leis Municipais</h2>
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table" id="table-projetos-leis-municipais">
                            <thead>
                                <th>Número</th>
                                <th>Título</th>
                                <th>Autor</th>
                                <th>Categoria</th>
                                <th>Documento</th>
                                <th>Ano</th>
                                <th>Município</th>
                                <th>Situação</th>
                            </thead>
                            <tbody>
                                @foreach ($listLeis as $lei)
                                    <tr>
                                        <td>{{ $lei->tituloIndicacao }}</td>
                                        <td>{{ $lei->numeroIndicacao }}</td>
                                        <td>{{ $lei->nomeAutor }}</td>
                                        <td>{{ date('d/m/Y', strtotime($lei->dataVotacao)) }}</td>
                                        <td>
                                            @if ($lei->documento)
                                                <a href="{{ url('/arquivos/documentos/' . $lei->documento) }}"
                                                    target="_blank">Documento</a>
                                            @else
                                                Nenhum documento foi anexado
                                            @endif
                                        </td>
                                        <td>{{ $lei->ano }}</td>
                                        <td>{{ $lei->descricaoMunicipio }}</td>
                                        <td class="up-text"><span
                                                class="badge badge-info">{{ $lei->statusDescricao }}</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="page-section bg-light">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Leis Orgânicas</h2>
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table" id="table-listagens-leis-organicas">
                            <thead>
                                <th>Documento</th>
                                <th>Municipio</th>
                            </thead>
                            <tbody>
                                @foreach ($listLeisOrganicas as $list)
                                    <tr>
                                        <td><a href="{{ url('/arquivos/leis/' . $list->documento) }}"
                                                target="_blank">Documento</a></td>
                                        <td class="text-uppercase">{{ $list->descricao }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="page-section bg-light">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Regimento Interno</h2>
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table" id="table-listagens-regimento-interno">
                            <thead>
                                <th>Documento</th>
                                <th>Municipio</th>
                            </thead>
                            <tbody>
                                @foreach ($listLeisOrganicas as $list)
                                    <tr>
                                        <td><a href="{{ url('/arquivos/leis/' . $list->documento) }}"
                                                target="_blank">Documento</a></td>
                                        <td class="text-uppercase">{{ $list->descricao }}</td>
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
