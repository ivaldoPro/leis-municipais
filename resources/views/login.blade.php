@extends('components.layout')

@section('content')
    @if (session('message-failed-login'))
        <div class="col-md-6 offset-3">
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <span class="span-alert">{{ session('message-failed-login') }}</span>
            </div>
        </div>
    @endif
    <section class="min-vh-50 mb-8">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-6 mx-auto">
                    <div class="card z-index-0">
                        <div class="card-header text-center pt-4">
                            <h5>Olá, seja bem-vindo!</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('auth') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Email:</label>
                                    <input type="email" class="form-control" placeholder="Digita seu email" name="email"
                                        required autocomplete="off">
                                    <input type="hidden" name="status" value="1">
                                </div>
                                <div class="form-group">
                                    <label>Senha:</label>
                                    <input type="password" class="form-control" placeholder="Digite sua senha"
                                        name="password" required>
                                </div>
                                <small class="form-text text-muted">Não compartilhe seus dados de
                                    acesso!</small>
                                <div class="container-button">
                                    <div class="row">
                                        <div class="col-xl-5 col-lg-6 col-md-7 mx-auto">
                                            <button type="submit" class="btn btn-primary btn-login-page">Entrar <i
                                                    class="fa-solid fa-paper-plane"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
