<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicacao extends Model
{
    use HasFactory;
    protected $table = 'indicacao';
    protected $fillable = ['tituloIndicacao', 'numeroIndicacao', 'autor', 'dataVotacao', 'status', 'descricao'];
}