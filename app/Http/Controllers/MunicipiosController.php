<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Municipio;

class MunicipiosController extends Controller
{
    public function toListagem(){
        $listMunicipios = Municipio::get();
        return view('municipios/listagem', ['listMunicipios' => $listMunicipios]);
    }

    public function toCadastro(){
        return view('municipios/cadastro');
    }

    public function salvar(Request $request){
        Municipio::create($request->all());

        return redirect()->route('municipio.listagem')->with('message-success-municipio', 'Municipio cadastrado com sucesso!');
    }

    public function toEdit(Request $request){
        $dados = Municipio::find($request->id);
        return view('municipios/editar', ['dados' => $dados]);
    }

    public function salvarEdicao(Request $request){
        $dados = Municipio::find($request->id);

        $dados->update([
            'municipio' => $request->municipio,
            'uf' => $request->uf
        ]);

        return redirect()->route('municipio.listagem')->with('message-success-update-municipio', 'Municipio atualizado com sucesso!');
    }
}