<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Indicacao;
use App\Models\Projeto;
use App\Models\Vereadores;
use App\Models\Organica;
use App\Models\RegimentoInterno;
use App\Models\Municipio;

class SiteController extends Controller
{
    
    public function site(){
        $leiOrganica = null;
        $regimentoInterno = null;

        $listVereadores = Vereadores::getListagemVereadores();

        $leiOrganicaList = Organica::get();
        $regimentoInternoList = RegimentoInterno::get();

        if($leiOrganicaList->count() > 0){
            $leiOrganica = $leiOrganicaList[0];
        }

        if($regimentoInternoList->count()){
            $regimentoInterno = $regimentoInternoList[0];
        }

        $listMunicipios = Municipio::get();

        return view('site/index', 
        ['listVereadores' => $listVereadores, 
        'leiOrganica' => $leiOrganica,
        'regimentoInterno' => $regimentoInterno,
        'listMunicipios' => $listMunicipios]);
    }

    public function getIndicacoes(){
        $projetos = Projeto::getListagemProjetos();
        return view('site/indicacoes', ['projetos' => $projetos]);
    }

    public function filtrar(Request $request){
        if($request->municipio == 0){
            $listVereadores = Vereadores::getListagemVereadores();
        }else{
            $listVereadores = Vereadores::getListagemVereadoresPorMunicipio($request->municipio);
        }   
        $listMunicipios = Municipio::get();
        $leiOrganicaList = Organica::get();
        $regimentoInternoList = RegimentoInterno::get();

        if($leiOrganicaList->count() > 0){
            $leiOrganica = $leiOrganicaList[0];
        }

        if($regimentoInternoList->count()){
            $regimentoInterno = $regimentoInternoList[0];
        }
        return view('site/index', [
            'listVereadores' => $listVereadores,
            'leiOrganica' => $leiOrganica,
            'regimentoInterno' => $regimentoInterno,
            'listMunicipios' => $listMunicipios
        ]);
    }

    public function getListLeis(){
        $listLeis = Indicacao::getListagemIndicacoes();
        $listLeisOrganicas = Organica::listagemLeisOrganicas();
        $listRegimentoInterno = RegimentoInterno::listagemRegimentoInterno();
        
        return view('site.leis', [
            'listLeis' => $listLeis, 
            'listLeisOrganicas' => $listLeisOrganicas,
            'listRegimentoInterno' => $listRegimentoInterno
        ]);
    }

}