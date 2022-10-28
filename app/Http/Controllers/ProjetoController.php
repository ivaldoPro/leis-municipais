<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Projeto;
use App\Models\Municipio;
use App\Models\Vereadores;

class ProjetoController extends Controller
{
    public function toListagemProjeto(){
        $projetos = null;

        if(Auth::user()->perfil == 1){
            $projetos = Projeto::getListagemProjetos();
        }else{
            $vereadores = Vereadores::where('email', Auth::user()->email)->get()[0];
            $projetos = Projeto::getListagemProjetosPorMunicipio($vereadores->municipio);
        }

        return view('projeto.listagem', ['projetos' => $projetos]);
    }

    public function toCadastroProjeto(){
        $listSessoes = DB::table('sessao')->get();
        $listCategorias = DB::table('categoria')->get();
        $listVereadores = DB::table('vereadores')->get();
        $listMunicipios = Municipio::get();

        return view('projeto.cadastro', 
        [
            'listSessoes' => $listSessoes, 
            'listCategorias' => $listCategorias,
            'listVereadores' => $listVereadores,
            'listMunicipios' => $listMunicipios
        ]);
    }

    public function salvarProjeto(Request $request){
        if ($request->hasFile('documento') && $request->file('documento')->isValid()){
            $requestDocument = $request->documento;
            $extension = $requestDocument->extension();
            $nameFile = $request->titulo . "_" . $request->numero . "_" . $request->sessao . "." . $extension;
            $request -> documento -> move(public_path('arquivos/documentos'), $nameFile);
            $request -> documento = $nameFile;     
        }

        Projeto::create([
            'sessao' => $request->sessao,
            'titulo' => $request->titulo,
            'numero' => $request->numero,
            'categoria' => $request->categoria,
            'autor' => $request->autor,
            'dataVotacao' => $request->dataVotacao,
            'status' => 1,
            'descricao' => $request->descricao,
            'documento' => $request->documento,
            'ano' => $request->ano,
            'municipio' => $request->municipio,
        ]);
        
        return redirect()->route('listagem.projetos')->with('message-success-projeto', 'Projeto cadastrado com sucesso!');
    }

    public function updateStatusProjeto(Request $request){
        $projeto = Projeto::find($request->id);
        if($projeto->status == 1){
            $projeto->update(['status' => 2]);
        }else{
            $projeto->update(['status' => 1]);
        }
        return redirect()->route('listagem.projetos')->with('message-success-update-status-projeto', 'Status do projeto alterado com sucesso!'); 
    }
}