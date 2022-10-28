<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Vereadores extends Model
{
    use HasFactory;
    protected $table = 'vereadores';
    protected $fillable = ['nome', 'apelido', 'partido', 'cargo', 'email', 'imagem', 'status', 'biografia', 'municipio'];

    public static function verificaExistenciaVereadorPorEmail($email){
        return DB::table('vereadores')->where('email', $email)->count();
    }

    public static function findByEmail($email){
        $list = DB::table('vereadores')->where('email', $email)->get();
        $dados;
        foreach($list as $l){
            $dados = $l;
        }
        return $dados;
    }

    public static function getListagemVereadores(){
        return DB::table('vereadores')
            ->join('status', 'vereadores.status', '=', 'status.id')
            ->join('municipio', 'vereadores.municipio', '=', 'municipio.id')
            ->select('vereadores.*', 'status.descricao as descricaoStatus', 
            'municipio.id as idMunicipio', 'municipio.municipio as descricaoMunicipio')
            ->where('vereadores.status', 1)
            ->get();
    }

    public static function getListagemVereadoresPorMunicipio($idMunicipio){
        return DB::table('vereadores')
            ->join('status', 'vereadores.status', '=', 'status.id')
            ->join('municipio', 'vereadores.municipio', '=', 'municipio.id')
            ->select('vereadores.*', 'status.descricao as descricaoStatus', 
            'municipio.id as idMunicipio', 'municipio.municipio as descricaoMunicipio')
            ->where('vereadores.municipio', $idMunicipio)
            ->where('vereadores.status', 1)
            ->get();
    }
}