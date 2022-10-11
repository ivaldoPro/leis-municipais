@extends('components.app')
@section('content')
    @if (session('message-success-reset-password'))
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <span class="span-alert">{{ session('message-success-reset-password') }}</span>
            </div>
        </div>
    @endif
    @if (session('message-success-update-status'))
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show">
                <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <span class="span-alert">{{ session('message-success-update-status') }}</span>
            </div>
        </div>
    @endif
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
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Listagem de Usuários</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table-listagens">
                        <thead class=" text-primary">
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Perfil</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>
                            @foreach ($listUsuarios as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->perfilDescricao }}</td>
                                    <td class="up-text">
                                        @if ($user->status == 1)
                                            <span class="badge badge-success">{{ $user->statusDescricao }}</span>
                                        @else
                                            <span class="badge badge-danger">{{ $user->statusDescricao }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('reset', $user->id) }}" type="button"
                                                class="btn btn-warning btn-group-table" title="Resetar senha"><i
                                                    class="fa-solid fa-arrow-rotate-right"></i></a>
                                        </div>
                                        <div class="btn-group" role="group">
                                            @if (Auth::user()->id != $user->id)
                                                @if ($user->status == 1)
                                                    <a href="{{ route('update.status', $user->id) }}" type="button"
                                                        class="btn btn-danger btn-group-table" title="Desativar usuário"><i
                                                            class="fa-solid fa-user-xmark"></i></a>
                                                @else
                                                    <a href="{{ route('update.status', $user->id) }}" type="button"
                                                        class="btn btn-success btn-group-table" title="Ativar usuário"><i
                                                            class="fa-solid fa-user-plus"></i></a>
                                                @endif
                                            @endif
                                        </div>
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
