<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Organica extends Model
{
    use HasFactory;
    protected $table = 'organica';
    protected $fillable = ['documento', 'municipio'];

    public static function verificaSeExisteDocumentoPorMunicipio($idMuncipio){
        return DB::table('organica')->where('municipio', $idMuncipio)->count() > 0;
    }

    public static function listagemLeisOrganicas(){
        return DB::table('organica')
            ->join('municipio', 'organica.municipio', '=', 'municipio.id')
            ->select('organica.documento as documento', 'organica.id as id', 
            'municipio.municipio as descricao')
            ->get();
    }
}