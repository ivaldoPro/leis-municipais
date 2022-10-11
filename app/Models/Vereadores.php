<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Vereadores extends Model
{
    use HasFactory;
    protected $table = 'vereadores';
    protected $fillable = ['nome', 'apelido', 'partido', 'cargo', 'email', 'imagem', 'status'];

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
}