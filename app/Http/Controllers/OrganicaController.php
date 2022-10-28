<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Organica;
use App\Models\Municipio;

class OrganicaController extends Controller
{
    
    public function toListagem(){
        $listLeisOrganicas = Organica::listagemLeisOrganicas();

        return view('organica.listagem', ['listLeisOrganicas' => $listLeisOrganicas]);
    }

    public function toCadastro(){
        $listMunicipios = Municipio::get();
        return view('organica.cadastro', ['listMunicipios' => $listMunicipios]);
    }

    public function salvar(Request $request){
        if(Organica::verificaSeExisteDocumentoPorMunicipio($request->municipio)){
            return redirect()->back()->with('message-error-municipio', 'Já existe um documento vinculado a esse município!');
        }else{
            if ($request->hasFile('documento') && $request->file('documento')->isValid()){
                $requestDocument = $request->documento;
                $extension = $requestDocument->extension();
                $nameFile = md5($requestDocument->getClientOriginalName() . strtotime("now")) . "." . $extension;
                $request -> documento -> move(public_path('arquivos/leis'), $nameFile);
                $request -> documento = $nameFile;     
            }

            Organica::create([
                'documento' => $request->documento,
                'municipio' => $request->municipio
            ]);

            return redirect()->route('organica.listagem')->with('message-success-organica', 'Lei Orgânica cadastrada com sucesso!');
        }
    }

    public function deletar(Request $request){
        $lei = Organica::find($request->id);
        $lei->delete();

        return redirect()->route('organica.listagem')->with('message-success-delete', 'Documento deletado com sucesso');
    }

}