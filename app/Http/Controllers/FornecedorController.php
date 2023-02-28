<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        return view('app.fornecedor.index');
     }

     public function listar(Request $request){
        
        $output = array(
            'fornecedores' => '',
        );
        
        
        $fornecedores = fornecedor::with('produtos')->where('nome','like','%' . $request->input('nome') . '%')
            ->where('site','like','%' . $request->input('site') . '%')
            ->where('uf','like','%' . $request->input('uf') . '%')
            ->where('email','like','%' . $request->input('email') . '%')->paginate(10);

        
        $output['fornecedores'] = $fornecedores;
        $output['request'] = $request->all();

        return view('app.fornecedor.listar', $output);
     }

     public function adicionar(Request $request){

        $output = array(
            'msg' => '',
            'id' => '',
        );

        if($request->input('_token') && !$request->input('id')){
            $regras = array(
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email',
            );

            $feedback = array(
                'required' => 'O campo :attribute deve ser preenchido.',
                'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
                'uf.min' => 'O campo UF deve ter no mínimo 2 caracteres',
                'uf.max' => 'O campo UF deve ter no máximo 2 caracteres',
                'email' => 'O campo e-mail não foi preechido corretamente',
            );

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msg = 'Cadastro realizado com sucesso';

            $output['msg'] = $msg;

        } else if($request->input('_token') && $request->input('id')){
            
            $fornecedor = Fornecedor::find($request->input('id'));
            $fornecedor->update($request->all());

            $msg = 'Cadastro atualizado com sucesso';
            
            $output = array(
                'id' => $request->input('id'),
                'msg' => $msg,
            );

            return redirect()->route('app.fornecedor.editar', $output);
           
        }
        
        return view ('app.fornecedor.adicionar', $output);
     }

     public function editar($id, $msg = ''){
        $fornecedor = Fornecedor::find($id);


        $output = array(
            'fornecedor' => $fornecedor,
            'msg' => $msg
        );


        return view('app.fornecedor.adicionar', $output);
     }

     public function excluir($id){
        Fornecedor::find($id)->delete();

        return redirect()->route('app.fornecedor');
     }
}
