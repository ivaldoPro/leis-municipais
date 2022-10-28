@extends('components.app')
@section('content')
    @if (session('message-success-projeto'))
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <span class="span-alert">{{ session('message-success-projeto') }}</span>
            </div>
        </div>
    @endif
    @if (session('message-success-update-status-projeto'))
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <span class="span-alert">{{ session('message-success-update-status-projeto') }}</span>
            </div>
        </div>
    @endif
    <div class="col-md-12">
        <div class="d-flex justify-content-end">
            <a href="{{ route('cadastro.projetos') }}" class="btn btn-secondary btn-sm ms-auto">Cadastrar <i
                    class="fa-solid fa-plus"></i></a>
        </div>
    </div>
    <div class="col-md-12">
        @if (session('message-success-reset-password'))
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                    <span class="span-alert">{{ session('message-success-reset-password') }}</span>
                </div>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Listagem de Requerimentos e Indicações</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table-listagens">
                        <thead class="text-primary">
                            <th>Data da Votação</th>
                            <th>Sessão</th>
                            <th>Número</th>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Categoria</th>
                            <th>Documento</th>
                            <th>Ano</th>
                            <th>Status</th>
                            <th>Ações</th>
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
                                    <td class="up-text">
                                        @if ($projeto->status == 1)
                                            <span class="badge badge-success">{{ $projeto->descricaoStatus }}</span>
                                        @else
                                            <span class="badge badge-danger">{{ $projeto->descricaoStatus }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($projeto->status == 1)
                                            <a href="{{ route('projeto.status', $projeto->id) }}" type="button"
                                                class="btn btn-danger btn-group-table" title="Inativar projeto"><i
                                                    class="fa-solid fa-check"></i></a>
                                        @else
                                            <a href="{{ route('projeto.status', $projeto->id) }}" type="button"
                                                class="btn btn-success btn-group-table" title="Ativar projeto"><i
                                                    class="fa-solid fa-check"></i></a>
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
