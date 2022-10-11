@extends('components.app')
@section('content')
    <div class="col-md-12">
        <div class="d-flex justify-content-end">
            <a href="{{ route('tribuna.solicitacoes') }}" class="btn btn-secondary btn-sm ms-auto">Voltar <i
                    class="fa-solid fa-arrow-left"></i></a>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Solicitantes - {{ $dadosSessao->nome }},
                    {{ date('d/m/Y', strtotime($dadosSessao->dataSessao)) }}</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive display">
                    <table class="table" id="table-listagens">
                        <thead class="text-primary">
                            <th>Solicitante</th>
                            <th>Cargo</th>
                            <th>Partido</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>
                            @foreach ($listSolicitantes as $solicitante)
                                <tr>
                                    <td>{{ $solicitante->nomeSolicitante }}</td>
                                    <td class="up-text">{{ $solicitante->cargoSolicitante }}</td>
                                    <td class="up-text">{{ $solicitante->partidoSolicitante }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('tribuna.autorizarFala', ['idSessao' => $dadosSessao->id, 'idVereador' => $solicitante->solicitante]) }}"
                                                type="button" class="btn btn-success btn-group-table" title="Liberar uso"
                                                target="_blank"><i class="fa-solid fa-check"></i></a>
                                        </div>
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
