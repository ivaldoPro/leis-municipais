<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Vereadores;
use App\Models\User;
use App\Models\Municipio;
use App\Models\Indicacao;
use App\Models\Projeto;
use App\Models\Organica;
use App\Models\RegimentoInterno;
use Illuminate\Support\Facades\DB, Hash;

class VereadoresController extends Controller
{
    
    public function toListagemVereador(){
        $listVereadores = Vereadores::getListagemVereadores();

        return view('vereadores.listagem', ['listVereadores' => $listVereadores]);
    }

    public function toCadastroVereador(){
        $listMunicipios = Municipio::get();
        
        return view('vereadores.cadastro', ['listMunicipios' => $listMunicipios]);
    }

    public function salvar(Request $request){
        if(Vereadores::verificaExistenciaVereadorPorEmail($request->email) != 0){
            return back()->with('error', 'O E-mail enviado já está cadastrado!');
        }
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()){

            $requestImagem = $request->imagem;
            $extension = $requestImagem->extension();
            $imageName = md5($requestImagem->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $request -> imagem -> move(public_path('img/events'), $imageName);
            $request -> imagem = $imageName;
        }
        
        Vereadores::create([
            'nome' => $request->nome,
            'apelido' => $request->apelido,
            'partido' => $request->partido,
            'cargo' => $request->cargo,
            'email' => $request->email,
            'status' => '1',
            'imagem' => $request->imagem,
            'biografia' => $request->biografia,
            'municipio' => $request->municipio,
        ]);

        User::create([
            'name' => $request->nome,
            'email' => $request->email,
            'password' => Hash::make('123456'), 
            'status' => '1',
            'perfil' => '2',
            'municipio' => $request->municipio

        ]);

        return redirect()->route('listagem.vereadores')->with('message-success-vereador', 'Vereador cadastrado com sucesso');
    }

    public function updateStatusVereador(Request $request){
        $vereador = Vereadores::find($request->id);
        $getUser = DB::table('users')->where('email', $vereador->email)->get();
        $user;
        foreach($getUser as $u){
            $user = User::find($u->id);
        }
        if($vereador->status == 1){
            $vereador->update(['status' => 2]);
            $user->update(['status' => 2]);
        }else{
            $vereador->update(['status' => 1]);
            $user->update(['status' => 1]);
        }
        return redirect()->route('listagem.vereadores')->with('message-success-update-status-vereadores', 'Status do ' .$vereador->cargo. ' alterado com sucesso!'); 
    }

    public function toEdit(Request $request){
        $vereador = Vereadores::find($request->id);
        $listMunicipios = Municipio::get();
        return view('vereadores.edit', ['vereador' => $vereador, 'listMunicipios' => $listMunicipios]);
    }

    public function salvarEdicao(Request $request){
        $vereador = Vereadores::find($request->id);
        $userVereador = DB::table('users')->where('email', $vereador->email)->get();
        $user = User::find($userVereador[0]->id);

        if($request->imagem){
            if ($request->hasFile('imagem') && $request->file('imagem')->isValid()){
                $requestImagem = $request->imagem;
                $extension = $requestImagem->extension();
                $imageName = md5($requestImagem->getClientOriginalName() . strtotime("now")) . "." . $extension;
                $request -> imagem -> move(public_path('img/events'), $imageName);
                $request -> imagem = $imageName;
            }

        }

        $vereador->update([
            'nome' => $request->nome,
            'apelido' => $request->apelido,
            'partido' => $request->partido,
            'cargo' => $request->cargo,
            'email' => $request->email,
            'imagem' => $request->imagem,
            'biografia' => $request->biografia,
            'municipio' => $request->municipio,
        ]);

        $user->update([
            'name' => $request->nome,
            'email' => $request->email,
            'municipio' => $request->municipio
        ]);

        return redirect()->route('listagem.vereadores')->with('message-success-update-dados-vereadores', 'Os dados do Vereador foram alterados com sucesso!');
    }
    
}