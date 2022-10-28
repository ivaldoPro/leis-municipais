<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Vereadores;
use App\Models\User;
use App\Models\Municipio;

class LoginController extends Controller
{
    
    public function login(){
        return view('login');
    }
    
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'status' => ['required']
        ]);

        $usuario = null;

        if(User::where('email', $request->email)->count() > 0){
            $usuario = User::where('email', $request->email)->get()[0];
            if($usuario->perfil == 1){
                if (Auth::attempt($credentials)) {
                    $request->session()->regenerate();
                    return redirect()->route('dashboard');
                } else {
                    return back()->with('message-failed-login', 'Não foi possível realizar sua autenticação, verifique seus dados de acesso ou contate um administrador!');
                }   

            }else{
                if(Vereadores::where('email', $request->email)->count() > 0){
                    $vereador = Vereadores::where('email', $request->email)->get()[0];
                    if($vereador->municipio != null){
                        if (Auth::attempt($credentials)) {
                            $request->session()->regenerate();
                            return redirect()->route('dashboard', ['municipio' => $municipio]);
                        } else {
                            return back()->with('message-failed-login', 'Não foi possível realizar sua autenticação, verifique seus dados de acesso ou contate um administrador!');
                        }  
                    }else{
                        return back()->with('message-failed-login', 'O Usuário não está vinculado a um município, entre em contato com o administrador!');
                    }
                }
            } 
        }else{
            return back()->with('message-failed-login', 'Usuário não encontrado!');
        }  
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}