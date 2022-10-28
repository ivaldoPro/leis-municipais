@extends('components.app')

@section('content')
    @if (session('error'))
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <span class="span-alert">{{ session('error') }}</span>
            </div>
        </div>
    @endif
    <div class="col-md-12">
        <div class="d-flex justify-content-end">
            <a href="{{ route('listagem.vereadores') }}" class="btn btn-secondary btn-sm ms-auto">Voltar <i
                    class="fa-solid fa-arrow-left"></i></a>
        </div>
    </div>
    <div class="container-fluid py-4">
        <form action="{{ route('update.vereadores') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-sm">Edição de Vereadores</h6>
                            <div class="row">
                                <input type="hidden" name="id" value="{{ $vereador->id }}">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Nome</label>
                                        <input class="form-control" type="text" name="nome" autocomplete="off"
                                            required value="{{ $vereador->nome }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Apelido</label>
                                        <input class="form-control" type="text" name="apelido" autocomplete="off"
                                            required value="{{ $vereador->apelido }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Partido</label>
                                        <input class="form-control" type="text" name="partido" autocomplete="off"
                                            required value="{{ $vereador->partido }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Cargo</label>
                                        <input class="form-control" type="text" name="cargo" autocomplete="off"
                                            required value="{{ $vereador->cargo }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-control-label">Email</label>
                                        <input class="form-control" type="email" name="email" autocomplete="off"
                                            required value="{{ $vereador->email }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="municipio" class="form-label">Município</label>
                                    <select class="form-control" id="municipio" name="municipio" required>
                                        <option value="0">Selecione</option>
                                        @foreach ($listMunicipios as $municipio)
                                            @if ($municipio->id == $vereador->id)
                                                <option selected value="{{ $municipio->id }}">{{ $municipio->municipio }},
                                                    {{ $municipio->uf }}
                                                </option>
                                            @else
                                                <option value="{{ $municipio->id }}">{{ $municipio->municipio }},
                                                    {{ $municipio->uf }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="biografia" class="form-label">Biografia</label>
                                        <textarea class="form-control" name="biografia" id="biografia" maxlength="5000" cols="30" rows="10" required>{{ $vereador->biografia }}</textarea>
                                        <p><label class="info"></label>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="biografia" class="form-label">Foto atual</label>
                                        <div>
                                            <img class="foto-edit" src="{{ url('/img/events/' . $vereador->imagem) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="imagem" class="form-label">Nova Foto</label>
                                        <input class="form-control" id="imagem" name="imagem" type="file">
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-success btn-sm ms-auto">Salvar <i
                                                class="fa-solid fa-check"></i></button>
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
