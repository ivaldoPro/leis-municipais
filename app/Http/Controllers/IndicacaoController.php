<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Indicacao;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class IndicacaoController extends Controller
{

    public function toListagemIndicacao(){
        $listIndicacoes = DB::table('indicacao')
            ->join('status', 'indicacao.status', '=', 'status.id')
            ->join('vereadores', 'indicacao.autor', '=', 'vereadores.id')
            ->select('indicacao.*', 'vereadores.nome as nomeAutor', 'status.descricao as statusDescricao')
            ->get();
            
        return view('indicacao.listagem', ['listIndicacoes' => $listIndicacoes]);
    }

    public function toCadastroIndicacao(){
        $listVereadores = DB::table('vereadores')->get();
        return view('indicacao.cadastro', ['listVereadores' => $listVereadores]);
    }

    public function salvar(Request $request){
        Indicacao::create($request->all());
        return redirect()->route('listagem.indicacao')->with('message-success-indicacao', 'Indicação cadastrada com sucesso, aguarde o dia da votação!');
    }

    public function updateStatus(Request $request){
        $indicacao = Indicacao::find($request->id);
        if($indicacao->status == 3){
            $indicacao->update(['status' => 2]);
        }else{
            $indicacao->update(['status' => 3]);
        }
        return redirect()->route('listagem.indicacao')->with('message-success-update-status', 'Status alterado com sucesso!');
    }

}