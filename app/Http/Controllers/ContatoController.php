<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use App\Models\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function index(Request $request)
    {

    //   dd($request);

    // print_r($request->input());
    // exit;
      
      if($request->input()){
          
        // $contato = new SiteContato();
        //   $contato->nome = $request->input('nome');
        //   $contato->telefone = $request->input('telefone');
        //   $contato->email = $request->input('email');
        //   $contato->motivo_contato = $request->input('motivo_contato');
        //   $contato->mensagem = $request->input('mensagem');
        //   $contato->save();

        // $contato->create($request->all());


      }

      $motivo_contatos = MotivoContato::all();


        $output = array(
            'titulo' => 'Super Gestão - Contato',
            'motivo_contatos' => $motivo_contatos
        );

        return view('site.contato', $output);
    }

    public function salvar(Request $request){

      $regras = array(
        'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000',
      );

      $feedback = array(
        'nome.required' => 'O campo nome é obrigatório',
        'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
        'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
        'nome.unique' => 'Já existe um nome cadastrado igual a este',
        'email.email' => 'O email informado é inválido',
        'required' => 'O campo :attribute deve ser preenchido.'
      );
      
      
      $request->validate($regras, $feedback);

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
