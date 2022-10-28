<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RegimentoInterno extends Model
{
    use HasFactory;
    protected $table = 'regimento_interno';
    protected $fillable = ['documento', 'municipio'];

    public static function verificaSeExisteDocumentoPorMunicipio($idMunicipio){
        return DB::table('regimento_interno')->where('municipio', $idMunicipio)->count() > 0;
    }

    public static function listagemRegimentoInterno(){
        return DB::table('regimento_interno')
            ->join('municipio', 'regimento_interno.municipio', '=', 'municipio.id')
            ->select('regimento_interno.documento as documento', 'regimento_interno.id as id', 
            'municipio.municipio as descricao')
            ->get();
    }
}