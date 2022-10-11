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
            <a href="{{ route('tribuna.list') }}" class="btn btn-secondary btn-sm ms-auto">Voltar <i
                    class="fa-solid fa-arrow-left"></i></a>
        </div>
    </div>
    <div class="container-fluid py-4">
        <form action="{{ route('salvar.tribuna') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-sm">Cadastro de Solicitações de Uso da Tribuna</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Sessão</label>
                                        <select class="form-control" name="sessao" required>
                                            <option value="0">Selecione</option>
                                            @foreach ($listSessoes as $sessao)
                                                <option value="{{ $sessao->id }}">{{ $sessao->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label">Solicitante</label>
                                        <select class="form-control" name="solicitante" required>
                                            <option value="0">Selecione</option>
                                            @if (Auth::user()->perfil == 2)
                                                <option value="{{ $vereador->id }}" selected>{{ $vereador->nome }}
                                                </option>
                                            @else
                                                @foreach ($listVereadores as $vereador)
                                                    <option value="{{ $vereador->id }}">{{ $vereador->nome }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Motivo</label>
                                        <input class="form-control form-control-sm" id="motivo" name="motivo"
                                            type="text" autocomplete="off">
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
