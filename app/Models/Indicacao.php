<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Indicacao extends Model
{
    use HasFactory;
    protected $table = 'indicacao';
    protected $fillable = ['tituloIndicacao', 'numeroIndicacao', 'autor', 'dataVotacao', 'status', 'descricao', 'documento', 'ano', 'municipio'];

    public static function getListagemIndicacoes(){
        return DB::table('indicacao')
            ->join('status', 'indicacao.status', '=', 'status.id')
            ->join('vereadores', 'indicacao.autor', '=', 'vereadores.id')
            ->join('municipio', 'indicacao.municipio', '=', 'municipio.id')
            ->select('indicacao.*', 'vereadores.nome as nomeAutor', 'status.descricao as statusDescricao', 
                    'municipio.id as idMunicipio', 'municipio.municipio as descricaoMunicipio')
            ->get();
    }

    public static function getListagemIndicacoesPorMunicipio($idMunicipio){
        return DB::table('indicacao')
            ->join('status', 'indicacao.status', '=', 'status.id')
            ->join('vereadores', 'indicacao.autor', '=', 'vereadores.id')
            ->select('indicacao.*', 'vereadores.nome as nomeAutor', 'status.descricao as statusDescricao')
            ->where('vereadores.municipio', $idMunicipio)
            ->get();
    }

    public static function getIndicacoesParaVotacao($date){
        return DB::table('indicacao')
            ->join('status', 'indicacao.status', '=', 'status.id')
            ->join('vereadores', 'indicacao.autor', '=', 'vereadores.id')
            ->select('indicacao.*', 'vereadores.nome as nomeAutor', 'status.descricao as statusDescricao')
            ->where('dataVotacao', $date->toDateString())
            ->get();
    }

    public static function getIndicacoesParaVotacaoPorMunicipio($date, $idMunicipio){
        return DB::table('indicacao')
            ->join('status', 'indicacao.status', '=', 'status.id')
            ->join('vereadores', 'indicacao.autor', '=', 'vereadores.id')
            ->select('indicacao.*', 'vereadores.nome as nomeAutor', 'status.descricao as statusDescricao')
            ->where('dataVotacao', $date->toDateString())
            ->where('indicacao.municipio', $idMunicipio)
            ->get();
    }
}