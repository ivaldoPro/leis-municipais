<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    use HasFactory;
    protected $table = 'projeto';
    protected $fillable = ['sessao', 'titulo', 'numero', 'categoria', 'autor', 'dataVotacao', 'status', 'descricao'];
}