<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request){
        
        $erro = '';
        if($request->get('erro') == 1){
            $erro = 'Usuário ou senha inválidos';
        }

        if($request->get('erro') == 2){
            $erro = 'Faça o login para acessar esta página';
        }
        

        $output = array(
            'titulo' => 'Login',
            'erro' => $erro,
        );
        
        return view('site.login', $output);
     }

     public function autenticar(Request $request){
        
        $regras = array(
            'usuario' => 'email',
            'senha' => 'required'
        );

        $feedback = array(
            'usuario.email' => 'O campo usuário(e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'

        );

        $request->validate($regras, $feedback);

        $email = $request->get('usuario');
        $password = $request->get('senha');

        $user = new User();

        $exists = $user->where('email', $email)->where('password', $password)->get()->first();
       
        if(isset($exists->name)){

            session_start();
            $_SESSION['nome'] = $exists->name;
            $_SESSION['email'] = $exists->email;

            return redirect()->route('app.home');

        }else{
            return redirect()->route('site.login',['erro' => 1]);
        }
     }

     public function sair(){
        session_destroy();
        return redirect()->route('site.index');
     }
}
