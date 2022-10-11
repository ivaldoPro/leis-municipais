<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vereadores;
use Illuminate\Support\Facades\DB, Hash;

class UserController extends Controller
{
    public function getListUsuarios(){
        $listUsuarios = DB::table('users')
            ->join('status', 'users.status', '=', 'status.id')
            ->join('perfis', 'users.perfil', '=', 'perfis.id')
            ->select('users.*', 'status.descricao as statusDescricao', 'perfis.descricao as perfilDescricao')
            ->get();
        return view('usuarios', ['listUsuarios' => $listUsuarios]);
    }

    public function resetPassword(Request $request){
        $user = User::find($request->id);
        $user->update([
            'password' => Hash::make('123456')
        ]);

        return redirect()->route('usuarios.list')->with('message-success-reset-password', 'A senha do usuário foi resetada com sucesso.');
    }

    public function toAlterarSenha(){
        return view('alterar-senha');
    }

    public function updatePassword(Request $request){
        $user = User::find($request->id);
        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('alterar.senha')->with('message-success-update-password', 'Senha alterada com sucesso, utilize sua nova senha no seu próximo acesso!');
    }

    public function updateStatus(Request $request){
        $user = User::find($request->id);
        $vereador = Vereadores::findByEmail($user->email);
        if($user->status == 1){
            $user->update(['status' => 2]);
        }else{
            if($vereador->status == 1){
                $user->update(['status' => 1]);
            }else{
                return back()->with('error', 'Este '.$vereador->cargo.' está desativado!');
            }
        }
        
        return redirect()->route('usuarios.list')->with('message-success-update-status', 'Status do usuário alterado com sucesso!'); 
    }
}