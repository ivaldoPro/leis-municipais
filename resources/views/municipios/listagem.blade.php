@extends('components.app')
@section('content')
    @if (session('message-success-municipio'))
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <span class="span-alert">{{ session('message-success-municipio') }}</span>
            </div>
        </div>
    @endif
    <div class="col-md-12">
        <div class="d-flex justify-content-end">
            <a href="{{ route('municipio.cadastro') }}" class="btn btn-secondary btn-sm ms-auto">Cadastrar <i
                    class="fa-solid fa-plus"></i></a>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Listagem de Municípios Vinculados</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table-listagens">
                        <thead class="text-primary">
                            <th>Município</th>
                            <th>UF</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>
                            @foreach ($listMunicipios as $municipio)
                                <tr>
                                    <td class="text-uppercase">{{ $municipio->municipio }}</td>
                                    <td class="text-uppercase">{{ $municipio->uf }}</td>
                                    <td>
                                        <a href="{{ route('municipio.editar', $municipio->id) }}" type="button"
                                            class="btn btn-success btn-group-table" title="Editar"><i
                                                class="fa-solid fa-edit"></i></a>
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
