<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Indicacao;
use App\Models\Municipio;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class IndicacaoController extends Controller
{

    public function toListagemIndicacao(){
        $listIndicacoes = Indicacao::getListagemIndicacoes();
            
        return view('indicacao.listagem', ['listIndicacoes' => $listIndicacoes]);
    }

    public function toCadastroIndicacao(){
        $listVereadores = DB::table('vereadores')->get();
        $listMunicipios = Municipio::get();

        return view('indicacao.cadastro', ['listVereadores' => $listVereadores, 'listMunicipios' => $listMunicipios]);
    }

    public function salvar(Request $request){
        if ($request->hasFile('documento') && $request->file('documento')->isValid()){
            $requestDocument = $request->documento;
            $extension = $requestDocument->extension();
            $nameFile = $request->tituloIndicacao . "_" . $request->numeroIndicacao . "." . $extension;
            $request -> documento -> move(public_path('arquivos/documentos'), $nameFile);
            $request -> documento = $nameFile;     
        }

        Indicacao::create([
            'tituloIndicacao' => $request->tituloIndicacao,
            'numeroIndicacao' => $request->numeroIndicacao,
            'autor' => $request->autor,
            'dataVotacao' => $request->dataVotacao,
            'status' => 3,
            'descricao' => $request->descricao,
            'documento' => $request->documento,
            'ano' => $request->ano,
            'municipio' => $request->municipio,
        ]);

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