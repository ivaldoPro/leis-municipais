@extends('components.app')
@section('content')
    @if (session('message-success-vereador'))
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <span class="span-alert">{{ session('message-success-vereador') }}</span>
            </div>
        </div>
    @endif
    @if (session('message-success-update-status-vereadores'))
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <span class="span-alert">{{ session('message-success-update-status-vereadores') }}</span>
            </div>
        </div>
    @endif
    @if (session('message-success-update-dados-vereadores'))
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <span class="span-alert">{{ session('message-success-update-dados-vereadores') }}</span>
            </div>
        </div>
    @endif
    <div class="col-md-12">
        <div class="d-flex justify-content-end">
            <a href="{{ route('cadastro.vereadores') }}" class="btn btn-secondary btn-sm ms-auto">Cadastrar <i
                    class="fa-solid fa-plus"></i></a>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Listagem de Vereadores</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive display">
                    <table class="table" id="table-listagens">
                        <thead class="text-primary">
                            <th>Nome</th>
                            <th>Partido</th>
                            <th>Cargo</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>
                            @foreach ($listVereadores as $vereador)
                                <tr>
                                    <td>{{ $vereador->nome }}</td>
                                    <td class="up-text">{{ $vereador->partido }}</td>
                                    <td class="up-text">{{ $vereador->cargo }}</td>
                                    <td class="up-text">
                                        @if ($vereador->status == 1)
                                            <span class="badge badge-success">{{ $vereador->descricaoStatus }}</span>
                                        @else
                                            <span class="badge badge-danger">{{ $vereador->descricaoStatus }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('edit.vereadores', $vereador->id) }}" type="button"
                                            class="btn btn-success btn-group-table" title="Editar Vereador"><i
                                                class="fa-solid fa-edit"></i></a>
                                        @if ($vereador->status == 1)
                                            <a href="{{ route('vereador.status', $vereador->id) }}" type="button"
                                                class="btn btn-danger btn-group-table" title="Inativar vereador"><i
                                                    class="fa-solid fa-check"></i></a>
                                        @else
                                            <a href="{{ route('vereador.status', $vereador->id) }}" type="button"
                                                class="btn btn-success btn-group-table" title="Ativar vereador"><i
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
