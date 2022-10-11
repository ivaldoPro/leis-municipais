<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tribuna extends Model
{
    use HasFactory;
    protected $table = 'tribuna';
    protected $fillable = ['solicitante', 'sessao', 'dataSolicitada', 'motivo'];
}