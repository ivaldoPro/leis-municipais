@extends('components.app')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Listagem de Solicitações</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive display">
                    <table class="table" id="table-listagens">
                        <thead class="text-primary">
                            <th>Sessão</th>
                            <th>Data da Sessão</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>
                            @foreach ($listSessoes as $sessao)
                                <tr>
                                    <td>{{ $sessao->nome }}</td>
                                    <td>{{ date('d/m/Y', strtotime($sessao->dataSessao)) }} </td>
                                    <td>
                                        <a href="{{ route('tribuna.ambiente', $sessao->id) }}" type="button"
                                            class="btn btn-success btn-group-table" title="Ir Para Ambiente da Sessão"><i
                                                class="fa-solid fa-arrow-up-long"></i></a>
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
