<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Vereadores;
use App\Models\User;
use Illuminate\Support\Facades\DB, Hash;

class VereadoresController extends Controller
{
    
    public function toListagemVereador(){
        $listVereadores = DB::table('vereadores')
            ->join('status', 'vereadores.status', '=', 'status.id')
            ->select('vereadores.*', 'status.descricao as descricaoStatus')
            ->get();

        return view('vereadores.listagem', ['listVereadores' => $listVereadores]);
    }

    public function toCadastroVereador(){
        return view('vereadores.cadastro');
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
            'imagem' => $request->imagem
        ]);

        User::create([
            'name' => $request->nome,
            'email' => $request->email,
            'password' => Hash::make('123456'), 
            'status' => '1',
            'perfil' => '2'

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
    
}