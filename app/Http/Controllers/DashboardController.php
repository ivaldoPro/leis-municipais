<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Indicacao;
use App\Models\IndicacoesVotadas;
use App\Models\Vereadores;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        $date = Carbon::now();
        $listIndicacaoAlterarStatus = DB::table('indicacao')->where('dataVotacao', $date->toDateString())->get();

        foreach($listIndicacaoAlterarStatus as $indicacao){
            if($indicacao->status == 3){
                $indicacaoBanco = Indicacao::find($indicacao->id);
                $indicacaoBanco->update(['status' => 4]);
            }
        }

        $listIndicacoes = DB::table('indicacao')
            ->join('status', 'indicacao.status', '=', 'status.id')
            ->join('vereadores', 'indicacao.autor', '=', 'vereadores.id')
            ->select('indicacao.*', 'vereadores.nome as nomeAutor', 'status.descricao as statusDescricao')
            ->where('dataVotacao', $date->toDateString())
            ->get();

        return view('dashboard', [
            'listIndicacoes' => $listIndicacoes, 
            'date' => $date->toDateString()
        ]);
    }

    public function encerrarVotacao(Request $request){
        $indicacao = Indicacao::find($request->id);
        $indicacao->update(['status' => 5]);
        return redirect()->route('dashboard')->with('message-success-encerrar-votacao', 'Votação encerrada!');
    }

    public function processaVotacao(Request $request){
        IndicacoesVotadas::create([
            'indicacao' => $request->idIndicacao,
            'votador' => Auth::user()->id,
            'voto' => $request->voto
        ]);
        return redirect()->route('dashboard')->with('message-success-votacao-concluida', 'Seu voto foi registrado!');
    }

    public static function verificaIndicacaoVotada($idIndicacao){
        $isVoted = DB::table('indicacoes_votadas')->where('indicacao', $idIndicacao)->where('votador', Auth::user()->id)->count();
        if($isVoted >= 1){
            return false;
        }
        return true;
    }

    public static function countVotosPositivos($idIndicacao){
        return DB::table('indicacoes_votadas')->where('indicacao', $idIndicacao)->where('voto', 1)->count();
    }

    public static function countVotosNegativos($idIndicacao){
        return DB::table('indicacoes_votadas')->where('indicacao', $idIndicacao)->where('voto', 0)->count();
    }

    public static function countVotosFaltantes($idIndicacao){
        $votosPositivos = \App\Http\Controllers\DashboardController::countVotosPositivos($idIndicacao);
        $votosNegativos = \App\Http\Controllers\DashboardController::countVotosNegativos($idIndicacao);

        $somaVotosPositivosNegativos = $votosPositivos + $votosNegativos;

        $listVereadores = DB::table('vereadores')->where('status', 1)->count();

        return $listVereadores - $somaVotosPositivosNegativos;
    }
    
}