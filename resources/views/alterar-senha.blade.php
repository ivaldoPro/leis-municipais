@extends('components.app')
@section('content')
    <div class="container-fluid py-4">
        @if (session('message-success-update-password'))
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible fade show">
                    <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                    <span class="span-alert">{{ session('message-success-update-password') }}</span>
                </div>
            </div>
        @endif
        <form action="{{ route('update.password') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-4 offset-4">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-sm">Alterar senha</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Nova senha</label>
                                        <input class="form-control" type="password" name="password" autocomplete="off"
                                            required>
                                        <input class="form-control" type="hidden" name="id"
                                            value="{{ Auth::user()->id }}">
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-primary btn-sm ms-auto">Salvar <i
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
