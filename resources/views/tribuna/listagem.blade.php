@extends('components.app')
@section('content')
    @if (session('message-success-tribuna'))
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <span class="span-alert">{{ session('message-success-tribuna') }}</span>
            </div>
        </div>
    @endif
    <div class="col-md-12">
        <div class="d-flex justify-content-end">
            <a href="{{ route('tribuna.cadastro') }}" class="btn btn-secondary btn-sm ms-auto">Solicitar <i
                    class="fa-solid fa-plus"></i></a>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Listagem de Solicitantes</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive display">
                    <table class="table" id="table-listagens">
                        <thead class="text-primary">
                            <th>Solicitante</th>
                            <th>Partido</th>
                            <th>Cargo</th>
                            <th>Sessão</th>
                        </thead>
                        <tbody>
                            @foreach ($listSolicitacoes as $solicitacao)
                                <tr>
                                    <td>{{ $solicitacao->nomeSolicitante }}</td>
                                    <td class="up-text">{{ $solicitacao->partido }}</td>
                                    <td class="up-text"><span class="badge badge-info">{{ $solicitacao->cargo }}</span></td>
                                    <td>{{ $solicitacao->nomeSessao }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
