<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tribuna;
use App\Models\Sessao;
use App\Models\Vereadores;
use Illuminate\Support\Facades\Auth;

class TribunaController extends Controller
{
    public function listSolicitacoesUsoTribuna(){
        $listSolicitacoes = DB::table('tribuna')
            ->join('vereadores', 'tribuna.solicitante', '=', 'vereadores.id')
            ->join('sessao', 'tribuna.sessao', '=', 'sessao.id')
            ->select('tribuna.*', 'vereadores.nome as nomeSolicitante', 
                'sessao.nome as nomeSessao', 'vereadores.partido as partido', 'vereadores.cargo as cargo')
            ->get();
        return view('tribuna.listagem', ['listSolicitacoes' => $listSolicitacoes]);
    }

    public function cadastroSolicitacoes(){
        $listSessoes = DB::table('sessao')->get();
        $listVereadores = DB::table('vereadores')->get();
        $findVereadorByEmail = DB::table('vereadores')->where('email', Auth::user()->email)->get();
        $vereador = null;
        
        foreach($findVereadorByEmail as $v){
            $vereador = $v;
        }
        
        return view('tribuna.cadastro', 
        [
            'listSessoes' => $listSessoes, 
            'listVereadores' => $listVereadores,
            'vereador' => $vereador
        ]);
    }

    public function salvarSolicitacao(Request $request){
        if($request->sessao == 0 || $request->solicitante == 0){
            return redirect()->back()->with('error', 'Erro ao salvar, verifique o formulário e tente novamente!');
        }
        Tribuna::create($request->all());
        return redirect()->route('tribuna.list')
        ->with('message-success-tribuna', 
        'Solicitação para o Uso da Tribuna registrada com sucesso, aguarde o dia da sessão!');
    }

    public function listSolicitacoes(){
        $listSessoes = DB::table('sessao')
            ->join('status', 'sessao.status', '=', 'status.id')
            ->select('sessao.*', 'status.descricao as descricaoStatus')
            ->get();

        return view('tribuna.solicitacoes', ['listSessoes' => $listSessoes]);
    }

    public function toAmbiente(Request $request){
        $dadosSessao = Sessao::find($request->id);
        $listSolicitantes = DB::table('tribuna')
        ->join('vereadores', 'tribuna.solicitante', '=', 'vereadores.id')
        ->select('tribuna.*', 'vereadores.nome as nomeSolicitante', 
        'vereadores.partido as partidoSolicitante', 'vereadores.cargo as cargoSolicitante')
        ->where('tribuna.sessao', $dadosSessao->id)
        ->get();

        return view('tribuna.ambiente', ['listSolicitantes' => $listSolicitantes, 'dadosSessao' => $dadosSessao]);
    }

    public function autorizarFala(Request $request){
        $infoTribuna;
        
        $vereador = Vereadores::find($request->idVereador);
        $sessao = Sessao::find($request->idSessao);
        $listTribuna = DB::table('tribuna')->where('solicitante', $request->idVereador)->where('sessao', $request->idSessao)->get();
        
        foreach($listTribuna as $tribuna){
            $infoTribuna = $tribuna;
        }
        
        return view('tribuna.ambiente-fala', ['vereador' => $vereador, 'sessao' => $sessao, 'infoTribuna' => $infoTribuna]);
    }
}