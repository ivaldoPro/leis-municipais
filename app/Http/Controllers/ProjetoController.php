<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Projeto;

class ProjetoController extends Controller
{
    public function toListagemProjeto(){
        $projetos = DB::table('projeto')
            ->join('sessao', 'projeto.sessao', '=', 'sessao.id')
            ->join('categoria', 'projeto.categoria', '=', 'categoria.id')
            ->join('vereadores', 'projeto.autor', '=', 'vereadores.id')
            ->join('status', 'projeto.status', '=', 'status.id')
            ->select('projeto.id', 'projeto.titulo', 'projeto.dataVotacao', 'projeto.numero',
            'projeto.descricao', 'sessao.nome as nomeSessao', 
            'categoria.nome as nomeCategoria', 'vereadores.nome as nomeVereador',
            'status.descricao as descricaoStatus', 'projeto.status')
            ->get();

        return view('projeto.listagem', ['projetos' => $projetos]);
    }

    public function toCadastroProjeto(){
        $listSessoes = DB::table('sessao')->get();
        $listCategorias = DB::table('categoria')->get();
        $listVereadores = DB::table('vereadores')->get();

        return view('projeto.cadastro', 
        [
            'listSessoes' => $listSessoes, 
            'listCategorias' => $listCategorias,
            'listVereadores' => $listVereadores
        ]);
    }

    public function salvarProjeto(Request $request){
        Projeto::create($request->all());
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