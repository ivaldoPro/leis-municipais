@extends('components.app')

@section('content')
    <div class="col-md-12">
        <div class="d-flex justify-content-end">
            <a href="{{ route('listagem.projetos') }}" class="btn btn-secondary btn-sm ms-auto">Voltar <i
                    class="fa-solid fa-arrow-left"></i></a>
        </div>
    </div>
    <div class="container-fluid py-4">
        <form action="{{ route('salvar.projeto') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-sm">Cadastro de Requerimentos e Indicações</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Sessão</label>
                                        <select class="form-control" name="sessao" required>
                                            <option>Selecione</option>
                                            @foreach ($listSessoes as $sessao)
                                                <option value="{{ $sessao->id }}">{{ $sessao->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Título</label>
                                        <input class="form-control" type="text" name="titulo" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Número</label>
                                        <input class="form-control" type="text" name="numero" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Categoria</label>
                                        <select class="form-control" name="categoria" required>
                                            <option>Selecione</option>
                                            @foreach ($listCategorias as $categoria)
                                                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Autor</label>
                                        <select class="form-control" name="autor" required>
                                            <option>Selecione</option>
                                            @foreach ($listVereadores as $vereador)
                                                <option value="{{ $vereador->id }}">{{ $vereador->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="form-control-label">Data para votação</label>
                                        <input class="form-control" type="date" name="dataVotacao" autocomplete="off"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="form-control-label">Ano</label>
                                        <input class="form-control" type="text" name="ano" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Descrição</label>
                                        <textarea class="form-control" id="descricao" name="descricao" autocomplete="off" maxlength="2500"></textarea>
                                        <p><label class="info"></label>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="documento" class="form-label">Documento</label>
                                        <input class="form-control" id="documento" name="documento" type="file">
                                    </div>
                                </div>
                                <div class="col-md-3">
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
