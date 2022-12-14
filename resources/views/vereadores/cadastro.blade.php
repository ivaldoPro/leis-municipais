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
        <form action="{{ route('salvar.vereadores') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-sm">Cadastro de Vereadores</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Nome</label>
                                        <input class="form-control" type="text" name="nome"
                                            placeholder="Ex: Ana Silva" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Apelido</label>
                                        <input class="form-control" type="text" name="apelido" placeholder="Ex: Aninha"
                                            autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Partido</label>
                                        <input class="form-control" type="text" name="partido" placeholder="Ex: PT"
                                            autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Cargo</label>
                                        <input class="form-control" type="text" name="cargo"
                                            placeholder="Ex: Presidente" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Email</label>
                                        <input class="form-control" type="email" name="email"
                                            placeholder="Ex: anasilva@gmail.com" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="imagem" class="form-label">Foto</label>
                                        <input class="form-control" id="imagem" name="imagem" type="file">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="biografia" class="form-label">Biografia</label>
                                        <textarea class="form-control" name="biografia" id="biografia" maxlength="5000" cols="30" rows="10" required></textarea>
                                        <p><label class="info"></label>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="municipio" class="form-label">Munic??pio</label>
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
