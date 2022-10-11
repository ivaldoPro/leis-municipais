<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndicacaoController;
use App\Http\Controllers\VereadoresController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessaoController;
use App\Http\Controllers\ProjetoController;
use App\Http\Controllers\TribunaController;
use App\Http\Middleware\Authenticate;

Route::get('/', [LoginController::class, 'login']) -> name('login');
Route::post('/login', [LoginController::class, 'authenticate'])-> name('auth');

Route::middleware([Authenticate::class])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/indicacao/listagem', [IndicacaoController::class, 'toListagemIndicacao'])->name('listagem.indicacao');
    Route::get('/indicacao/cadastro', [IndicacaoController::class, 'toCadastroIndicacao'])->name('cadastro.indicacao');
    Route::get('/update-indicacao-status/{id}', [IndicacaoController::class, 'updateStatus'])->name('indicacao.status');
    Route::post('/salvar-indicacao', [IndicacaoController::class, 'salvar'])->name('salvar.indicacao');

    Route::get('/vereador/listagem', [VereadoresController::class, 'toListagemVereador'])->name('listagem.vereadores');
    Route::get('/vereador/cadastro', [VereadoresController::class, 'toCadastroVereador'])->name('cadastro.vereadores');
    Route::get('/vereador/status/{id}', [VereadoresController::class, 'updateStatusVereador'])->name('vereador.status');
    Route::post('/salvar-cadastro', [VereadoresController::class, 'salvar'])->name('salvar.vereadores');

    Route::get('/list-usuario', [UserController::class, 'getListUsuarios'])->name('usuarios.list');
    Route::get('/reset-password-user/{id}', [UserController::class, 'resetPassword'])->name('reset');
    Route::get('/alterar-senha', [UserController::class, 'toAlterarSenha'])->name('alterar.senha');
    Route::post('/update-password', [UserController::class, 'updatePassword'])->name('update.password');
    Route::get('/update-status/{id}', [UserController::class, 'updateStatus'])->name('update.status');

    Route::get('/sessao/historico', [SessaoController::class, 'toHistoricoSessao'])->name('sessao.historico');
    Route::get('/sessao/cadastro', [SessaoController::class, 'toCadastroSessao'])->name('sessao.cadastro');
    Route::get('/sessao/status/{id}', [SessaoController::class, 'updateStatusSessao'])->name('sessao.status');
    Route::post('/salvar-sessao', [SessaoController::class, 'salvarSessao'])->name('salvar.sessao');

    Route::get('/projeto/listagem', [ProjetoController::class, 'toListagemProjeto'])->name('listagem.projetos');
    Route::get('/projeto/cadastro', [ProjetoController::class, 'toCadastroProjeto'])->name('cadastro.projetos');
    Route::get('/projeto/status/{id}', [ProjetoController::class, 'updateStatusProjeto'])->name('projeto.status');
    Route::post('/salvar-projeto', [ProjetoController::class, 'salvarProjeto'])->name('salvar.projeto');

    Route::get('/encerrar-votacao/{id}', [DashboardController::class, 'encerrarVotacao'])->name('encerrar.votacao');
    Route::get('/votacao/{idIndicacao}/voto/{voto}', [DashboardController::class, 'processaVotacao'])->name('realiza.votacao');

    Route::get('/tribuna/listagem', [TribunaController::class, 'listSolicitacoesUsoTribuna'])->name('tribuna.list');
    Route::get('/tribuna/cadastro', [TribunaController::class, 'cadastroSolicitacoes'])->name('tribuna.cadastro');
    Route::post('/salvar-tribuna', [TribunaController::class, 'salvarSolicitacao'])->name('salvar.tribuna');
    Route::get('/tribuna/solicitacoes', [TribunaController::class, 'listSolicitacoes'])->name('tribuna.solicitacoes');
    Route::get('/tribuna/ambiente/{id}', [TribunaController::class, 'toAmbiente'])->name('tribuna.ambiente');
    Route::get('/tribuna/autorizar-fala/sessao/{idSessao}/{idVereador}', [TribunaController::class, 'autorizarFala'])->name('tribuna.autorizarFala');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    
});