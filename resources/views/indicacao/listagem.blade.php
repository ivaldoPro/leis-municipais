@extends('components.app')
@section('content')
    @if (session('message-success-indicacao'))
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <span class="span-alert">{{ session('message-success-indicacao') }}</span>
            </div>
        </div>
    @endif
    @if (session('message-success-update-status'))
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <span class="span-alert">{{ session('message-success-update-status') }}</span>
            </div>
        </div>
    @endif
    <div class="col-md-12">
        <div class="d-flex justify-content-end">
            <a href="{{ route('cadastro.indicacao') }}" class="btn btn-secondary btn-sm ms-auto">Cadastrar <i
                    class="fa-solid fa-plus"></i></a>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Listagem de Leis Municipais</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table-listagens">
                        <thead class="text-primary">
                            <th>Titulo</th>
                            <th>Número</th>
                            <th>Autor</th>
                            <th>Data da Votação</th>
                            <th>Documento</th>
                            <th>Ano</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>
                            @foreach ($listIndicacoes as $indicacao)
                                <tr>
                                    <td>{{ $indicacao->tituloIndicacao }}</td>
                                    <td>{{ $indicacao->numeroIndicacao }}</td>
                                    <td>{{ $indicacao->nomeAutor }}</td>
                                    <td>{{ date('d/m/Y', strtotime($indicacao->dataVotacao)) }}</td>
                                    <td>
                                        @if ($indicacao->documento)
                                            <a href="{{ url('/arquivos/documentos/' . $indicacao->documento) }}"
                                                target="_blank">Documento</a>
                                        @else
                                            Nenhum documento foi anexado
                                        @endif
                                    </td>
                                    <td>{{ $indicacao->ano }}</td>
                                    <td class="up-text"><span
                                            class="badge badge-info">{{ $indicacao->statusDescricao }}</span></td>
                                    <td>
                                        @if ($indicacao->status != 4)
                                            @if ($indicacao->status == 3)
                                                <a href="{{ route('indicacao.status', $indicacao->id) }}" type="button"
                                                    class="btn btn-danger btn-group-table" title="Inativar indicação"><i
                                                        class="fa-solid fa-check"></i></a>
                                            @else
                                                @if (!$indicacao->status == 5)
                                                    <a href="{{ route('indicacao.status', $indicacao->id) }}"
                                                        type="button" class="btn btn-success btn-group-table"
                                                        title="Ativar indicação"><i class="fa-solid fa-check"></i></a>
                                                @endif
                                            @endif
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
@endsection
