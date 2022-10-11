<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndicacoesVotadas extends Model
{
    use HasFactory;
    protected $table = 'indicacoes_votadas';
    protected $fillable = ['indicacao', 'votador', 'dataVotado', 'voto'];
}