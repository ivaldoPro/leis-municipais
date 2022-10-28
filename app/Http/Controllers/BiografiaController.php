<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BiografiaController extends Controller {
    
    public function buscarBiografia(Request $request){
        $listProjetosIndicados = DB::table('projeto')
            ->join('categoria', 'projeto.categoria', '=', 'categoria.id')
            ->join('vereadores', 'projeto.autor', '=', 'vereadores.id')
            ->select('projeto.id', 'projeto.titulo', 'projeto.numero',
            'projeto.descricao', 'categoria.nome as nomeCategoria', 
            'vereadores.nome as nomeVereador', 'projeto.documento', 'projeto.ano')
            ->where('vereadores.id', $request->id)
            ->get();

        $leis = DB::table('indicacao')
            ->join('status', 'indicacao.status', '=', 'status.id')
            ->join('vereadores', 'indicacao.autor', '=', 'vereadores.id')
            ->select('indicacao.*', 'vereadores.nome as nomeAutor', 'status.descricao as statusDescricao')
            ->get();

        $vereador = DB::table('vereadores')
            ->select('vereadores.nome', 'vereadores.partido', 'vereadores.cargo', 'vereadores.biografia', 'vereadores.imagem')
            ->where('vereadores.id', $request->id)
            ->get();
        return view('site.biografia', ['vereador' => $vereador[0], 'listProjetosIndicados' => $listProjetosIndicados, 'leis' => $leis]);
    }

}