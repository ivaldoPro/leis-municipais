@extends('components.app')
@section('content')
    <div class="col-md-12">
        <div class="d-flex justify-content-end">
            <a href="{{ route('sessao.historico') }}" class="btn btn-secondary btn-sm ms-auto">Voltar <i
                    class="fa-solid fa-arrow-left"></i></a>
        </div>
    </div>
    <div class="container-fluid py-4">
        <form action="{{ route('salvar.sessao') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-sm">Cadastro de Sessões</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Sessão</label>
                                        <input class="form-control" type="text" name="nome" autocomplete="off"
                                            required placeholder="Ex: Sessão Votação">
                                    </div>
                                </div>
                                <input class="form-control" type="hidden" name="status" value="1">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Número da Sessão</label>
                                        <input class="form-control" type="text" name="numero" autocomplete="off"
                                            required placeholder="Ex: 2022/001">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Data para votação</label>
                                        <input class="form-control" type="date" name="dataVotacao" autocomplete="off"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label">Observação</label>
                                        <textarea class="form-control" name="descricao" autocomplete="off"></textarea>
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
