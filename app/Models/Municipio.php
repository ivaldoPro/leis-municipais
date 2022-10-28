<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Municipio;

class Municipio extends Model
{
    use HasFactory;
    protected $table = 'municipio';
    protected $fillable = ['municipio', 'uf'];

    public static function buscarPorId($idMunicipio){
        return Municipio::find($idMunicipio)->municipio;
    }
}