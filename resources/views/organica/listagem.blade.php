@extends('components.app')
@section('content')
    @if (session('message-success-organica'))
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <span class="span-alert">{{ session('message-success-organica') }}</span>
            </div>
        </div>
    @endif
    @if (session('message-success-delete'))
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <span class="span-alert">{{ session('message-success-delete') }}</span>
            </div>
        </div>
    @endif
    <div class="col-md-12">
        <div class="d-flex justify-content-end">
            <a href="{{ route('organica.cadastro') }}" class="btn btn-secondary btn-sm ms-auto">Cadastrar <i
                    class="fa-solid fa-plus"></i></a>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Listagem de Leis Orgânicas</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table-listagens">
                        <thead class="text-primary">
                            <th>Documento</th>
                            <th>Municipio</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>
                            @foreach ($listLeisOrganicas as $list)
                                <tr>
                                    <td><a href="{{ url('/arquivos/leis/' . $list->documento) }}"
                                            target="_blank">Documento</a></td>
                                    <td class="text-uppercase">{{ $list->descricao }}</td>
                                    <td>
                                        <a href="{{ route('deletar.organica', $list->id) }}" type="button"
                                            class="btn btn-danger btn-group-table" title="Excluir"><i
                                                class="fa-solid fa-trash"></i></a>
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
