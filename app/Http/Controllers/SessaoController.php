<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sessao;
use Illuminate\Support\Facades\DB;

class SessaoController extends Controller
{
    public function toHistoricoSessao(){
        $listSessoes = DB::table('sessao')
            ->join('status', 'sessao.status', '=', 'status.id')
            ->select('sessao.*', 'status.descricao as descricaoStatus')
            ->get();
        return view('sessao.listagem', ['listSessoes' => $listSessoes]);
    }

    public function toCadastroSessao(){
        return view('sessao.cadastro');
    }

    public function salvarSessao(Request $request){
        Sessao::create($request->all());
        return redirect()->route('sessao.historico')->with('message-success-sessao', 'Sessão cadastrada com sucesso!');
    }

    public function updateStatusSessao(Request $request){
        $sessao = Sessao::find($request->id);
        if($sessao->status == 1){
            $sessao->update(['status' => 2]);
        }else{
            $sessao->update(['status' => 1]);
        }
        return redirect()->route('sessao.historico')->with('message-success-update-status-sessao', 'Status da sessão alterado com sucesso!'); 
    }
}