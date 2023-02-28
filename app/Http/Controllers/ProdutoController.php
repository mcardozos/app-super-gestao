<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Item;
use App\Models\Produto;
use App\Models\ProdutoDetalhe;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $produtos = Produto::paginate(10);
        $produtos = Item::paginate(10);


        // foreach($produtos as $key => $produto){
        //     $produto_detalhe = ProdutoDetalhe::where('produto_id', $produto->id)->first();

            
        //     if(isset($produto_detalhe)){
        //         $produtos[$key]['comprimento'] = $produto_detalhe->comprimento;
        //         $produtos[$key]['largura'] = $produto_detalhe->largura;
        //         $produtos[$key]['altura'] = $produto_detalhe->altura;
        //     }
        // }

        $output = array(
            'produtos' => $produtos,
            'request' => $request->all(),
        );

        return view('app.produto.index', $output);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();

        $output = array(
            'unidades' => $unidades,
            'fornecedores' => $fornecedores,
        );

        return view('app.produto.create', $output);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $regras = array(
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
        );

        $feedback = array(
            'required' => 'O campo deve ser preenchido',
            'nome.min' => 'O campo deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo deve ter no máximo 40 caracteres',
            'descricao.min' => 'O campo deve ter no mínimo 3 caracteres',
            'descricao.max' => 'O campo deve ter no máximo 2000 caracteres',
            'peso.integer' => 'O peso deve ter un número inteiro',
            'unidade_id.exists' => 'A unidade de medida informada não existe',
            'fornecedor_id.exists' => 'O fornecedor informado não existe'

        );

        $request->validate($regras, $feedback);

        // print_r($request);
        // exit;

        Item::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        $output = array(
            'produto' => $produto,
        );

        return view('app.produto.show', $output);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();

        $output = array(
            'produto' => $produto,
            'unidades' => $unidades,
            'fornecedores' => $fornecedores
        );


        return view('app.produto.edit', $output);
        // return view('app.produto.create', $output);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $produto)
    {

        $regras = array(
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
        );

        $feedback = array(
            'required' => 'O campo deve ser preenchido',
            'nome.min' => 'O campo deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo deve ter no máximo 40 caracteres',
            'descricao.min' => 'O campo deve ter no mínimo 3 caracteres',
            'descricao.max' => 'O campo deve ter no máximo 2000 caracteres',
            'peso.integer' => 'O peso deve ter un número inteiro',
            'unidade_id.exists' => 'A unidade de medida informada não existe',
            'fornecedor_id.exists' => 'O fornecedor informado não existe'

        );

        $request->validate($regras, $feedback);
        
        $output = array(
            'produto' => $produto->id,
        );
        
        $produto->update($request->all());

        return redirect()->route('produto.show', $output);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
