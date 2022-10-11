@extends('components.app')
@section('content')
    @if (session('message-success-sessao'))
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <span class="span-alert">{{ session('message-success-sessao') }}</span>
            </div>
        </div>
    @endif
    @if (session('message-success-update-status-sessao'))
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <span class="span-alert">{{ session('message-success-update-status-sessao') }}</span>
            </div>
        </div>
    @endif
    <div class="col-md-12">
        <div class="d-flex justify-content-end">
            <a href="{{ route('sessao.cadastro') }}" class="btn btn-secondary btn-sm ms-auto">Cadastrar <i
                    class="fa-solid fa-plus"></i></a>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Histórico de Sessões</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table-listagens">
                        <thead class="text-primary">
                            <th>Data</th>
                            <th>Número</th>
                            <th>Sessão</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>
                            @foreach ($listSessoes as $sessao)
                                <tr>
                                    <td>{{ date('d/m/Y', strtotime($sessao->dataSessao)) }} </td>
                                    <td>{{ $sessao->numero }}</td>
                                    <td>{{ $sessao->nome }}</td>
                                    <td class="up-text">
                                        @if ($sessao->status == 1)
                                            <span class="badge badge-success">{{ $sessao->descricaoStatus }}</span>
                                        @else
                                            <span class="badge badge-danger">{{ $sessao->descricaoStatus }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($sessao->status == 1)
                                            <a href="{{ route('sessao.status', $sessao->id) }}" type="button"
                                                class="btn btn-danger btn-group-table" title="Inativar sessão"><i
                                                    class="fa-solid fa-check"></i></a>
                                        @else
                                            <a href="{{ route('sessao.status', $sessao->id) }}" type="button"
                                                class="btn btn-success btn-group-table" title="Ativar sessão"><i
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
