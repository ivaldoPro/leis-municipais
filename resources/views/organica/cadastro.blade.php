@extends('components.app')

@section('content')
    @if (session('message-error-municipio'))
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <span class="span-alert">{{ session('message-error-municipio') }}</span>
            </div>
        </div>
    @endif
    <div class="col-md-12">
        <div class="d-flex justify-content-end">
            <a href="{{ route('organica.listagem') }}" class="btn btn-secondary btn-sm ms-auto">Voltar <i
                    class="fa-solid fa-arrow-left"></i></a>
        </div>
    </div>
    <div class="container-fluid py-4">
        <form action="{{ route('salvar.organica') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-sm">Cadastro de Leis Orgânicas</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="documento" class="form-label">Documento</label>
                                        <input class="form-control" id="documento" name="documento" type="file" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="municipio" class="form-label">Município</label>
                                    <select class="form-control" id="municipio" name="municipio" required>
                                        <option value="0">Selecione</option>
                                        @foreach ($listMunicipios as $municipio)
                                            <option value="{{ $municipio->id }}">{{ $municipio->municipio }},
                                                {{ $municipio->uf }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-success btn-sm ms-auto">Salvar <i
                                                class="fa-solid fa-check"></i></button>
                                        <button class="btn btn-warning btn-sm ms-auto" type="reset">Limpar <i
                                                class="fa-solid fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
