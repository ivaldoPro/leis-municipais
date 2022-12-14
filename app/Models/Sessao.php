<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sessao extends Model
{
    use HasFactory;
    protected $table = 'sessao';
    protected $fillable = ['nome', 'numero', 'dataSessao', 'observacao', 'status'];
}