@extends('components.app')

@section('content')
    <div class="col-md-12">
        <div class="d-flex justify-content-end">
            <a href="{{ route('listagem.indicacao') }}" class="btn btn-secondary btn-sm ms-auto">Voltar <i
                    class="fa-solid fa-arrow-left"></i></a>
        </div>
    </div>
    <div class="container-fluid py-4">
        <form action="{{ route('salvar.indicacao') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-sm">Cadastro de Indicações</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" type="hidden" name="status" value="3">
                                        <label class="form-control-label">Titulo</label>
                                        <input class="form-control" type="text" name="tituloIndicacao" autocomplete="off"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Número</label>
                                        <input class="form-control" type="text" name="numeroIndicacao" autocomplete="off"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Data para votação</label>
                                        <input class="form-control" type="date" name="dataVotacao" autocomplete="off"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Descrição</label>
                                        <textarea class="form-control" name="descricao" autocomplete="off" required></textarea>
                                    </div>
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
