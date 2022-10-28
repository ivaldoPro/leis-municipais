<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegimentoInterno;

class RegimentoInternoController extends Controller
{
    public function toListagem(){
        $listRegimentoInterno = RegimentoInterno::listagemRegimentoInterno();

        return view('regimento.listagem', ['listRegimentoInterno' => $listRegimentoInterno]);
    }

    public function toCadastro(){
        $listMunicipios = Municipio::get();
        return view('regimento.cadastro', ['listMunicipios' => $listMunicipios]);
    }

    public function salvar(Request $request){
        if(RegimentoInterno::verificaSeExisteDocumentoPorMunicipio($request->municipio)){
            return redirect()->back()->with('message-error-municipio', 'Já existe um documento vinculado a esse município!');
        }else{
            if ($request->hasFile('documento') && $request->file('documento')->isValid()){
                $requestDocument = $request->documento;
                $extension = $requestDocument->extension();
                $nameFile = md5($requestDocument->getClientOriginalName() . strtotime("now")) . "." . $extension;
                $request -> documento -> move(public_path('arquivos/leis'), $nameFile);
                $request -> documento = $nameFile;     
            }

            RegimentoInterno::create([
                'documento' => $request->documento
            ]);

            return redirect()->route('regimento.listagem')->with('message-success-organica', 'Regimento interno cadastrado com sucesso!');
        }
        
    }

    public function deletar(Request $request){
        $lei = RegimentoInterno::find($request->id);
        $lei->delete();

        return redirect()->route('regimento.listagem')->with('message-success-delete', 'Documento deletado com sucesso');
    }
}