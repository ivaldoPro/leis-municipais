<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Projeto extends Model
{
    use HasFactory;
    protected $table = 'projeto';
    protected $fillable = ['sessao', 'titulo', 'numero', 'categoria', 'autor', 'dataVotacao', 'status', 'descricao', 'documento', 'ano', 'municipio'];

    public static function getListagemProjetos(){
        return DB::table('projeto')
            ->join('sessao', 'projeto.sessao', '=', 'sessao.id')
            ->join('categoria', 'projeto.categoria', '=', 'categoria.id')
            ->join('vereadores', 'projeto.autor', '=', 'vereadores.id')
            ->join('status', 'projeto.status', '=', 'status.id')
            ->join('municipio', 'projeto.municipio', '=', 'municipio.id')
            ->select('projeto.id', 'projeto.titulo', 'projeto.dataVotacao', 'projeto.numero',
            'projeto.descricao', 'sessao.nome as nomeSessao', 
            'categoria.nome as nomeCategoria', 'vereadores.nome as nomeVereador',
            'status.descricao as descricaoStatus', 'projeto.status', 'projeto.documento', 'projeto.ano',
            'municipio.id as idMunicipio', 'municipio.municipio as descricaoMunicipio')
            ->get();
    }

    public static function getListagemProjetosPorMunicipio($idMunicipio){
        return DB::table('projeto')
            ->join('sessao', 'projeto.sessao', '=', 'sessao.id')
            ->join('categoria', 'projeto.categoria', '=', 'categoria.id')
            ->join('vereadores', 'projeto.autor', '=', 'vereadores.id')
            ->join('status', 'projeto.status', '=', 'status.id')
            ->select('projeto.id', 'projeto.titulo', 'projeto.dataVotacao', 'projeto.numero',
            'projeto.descricao', 'sessao.nome as nomeSessao', 
            'categoria.nome as nomeCategoria', 'vereadores.nome as nomeVereador',
            'status.descricao as descricaoStatus', 'projeto.status', 'projeto.documento', 'projeto.ano')
            ->where('projeto.municipio', $idMunicipio)
            ->get();
    }
}