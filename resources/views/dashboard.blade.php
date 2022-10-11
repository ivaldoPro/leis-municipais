@extends('components.app')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Votações Hoje - {{ date('d/m/Y', strtotime($date)) }}</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table-listagens">
                        <thead class="text-primary">
                            <th>Titulo Indicação</th>
                            <th>Número Indicação</th>
                            <th>Autor</th>
                            <th>Data da Votação</th>
                            <th>Status</th>
                            <th>Votos Sim</th>
                            <th>Votos Não</th>
                            <th>Faltantes</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>
                            @foreach ($listIndicacoes as $indicacao)
                                <tr>
                                    <td>{{ $indicacao->tituloIndicacao }}</td>
                                    <td>{{ $indicacao->numeroIndicacao }}</td>
                                    <td>{{ $indicacao->nomeAutor }}</td>
                                    <td>{{ date('d/m/Y', strtotime($indicacao->dataVotacao)) }}</td>
                                    <td><span class="badge badge-info">{{ $indicacao->statusDescricao }}</span></td>
                                    <td><span
                                            class="badge badge-success pull-center-text">{{ \App\Http\Controllers\DashboardController::countVotosPositivos($indicacao->id) }}</span>
                                    </td>
                                    <td><span
                                            class="badge badge-danger">{{ \App\Http\Controllers\DashboardController::countVotosNegativos($indicacao->id) }}</span>
                                    </td>
                                    <td><span
                                            class="badge badge-secondary">{{ \App\Http\Controllers\DashboardController::countVotosFaltantes($indicacao->id) }}</span>
                                    </td>
                                    <td>
                                        @if (Auth::user()->perfil == 1)
                                            @if ($indicacao->status != 5)
                                                <a href="{{ route('encerrar.votacao', $indicacao->id) }}" type="button"
                                                    class="btn btn-info btn-group-table" title="Encerrar votação"><i
                                                        class="fa-solid fa-check"></i></a>
                                            @endif
                                        @else
                                            @if (\App\Http\Controllers\DashboardController::verificaIndicacaoVotada($indicacao->id))
                                                <a href="{{ route('realiza.votacao', ['idIndicacao' => $indicacao->id, 'voto' => 1]) }}"
                                                    type="button" class="btn btn-success btn-group-table"
                                                    title="Votar a favor"><i class="fa-solid fa-thumbs-up"></i></a>
                                                <a href="{{ route('realiza.votacao', ['idIndicacao' => $indicacao->id, 'voto' => 0]) }}"
                                                    type="button" class="btn btn-danger btn-group-table"
                                                    title="Votar contra"><i class="fa-solid fa-thumbs-down"></i></a>
                                            @else
                                                <span class="badge badge-info">Você já votou nessa indicação.</span>
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
