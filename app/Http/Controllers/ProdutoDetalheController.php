<?php

namespace App\Http\Controllers;

use App\Models\ItemDetalhe;
use App\Models\ProdutoDetalhe;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutoDetalheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        
        $output = array(
            'unidades' => $unidades,
        );
        
        
        return view('app.produto_detalhe.create', $output);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProdutoDetalhe::create($request->all());
        echo('Cadastro realizado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProdutoDetalhe  $produtoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function show(ProdutoDetalhe $produtoDetalhe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProdutoDetalhe  $produtoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produtoDetalhe = ItemDetalhe::find($id);

        $unidades = Unidade::all();
        
        $output = array(
            'produto_detalhe' => $produtoDetalhe,
            'unidades' => $unidades,
        );


        return view('app.produto_detalhe.edit', $output);
    }
    // public function edit(ProdutoDetalhe $produtoDetalhe)
    // {

    //     $unidades = Unidade::all();
        
    //     $output = array(
    //         'produto_detalhe' => $produtoDetalhe,
    //         'unidades' => $unidades,
    //     );


    //     return view('app.produto_detalhe.edit', $output);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProdutoDetalhe  $produtoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdutoDetalhe $produtoDetalhe)
    {
        $produtoDetalhe->update($request->all());
        echo('atualização realizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProdutoDetalhe  $produtoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdutoDetalhe $produtoDetalhe)
    {
        //
    }
}
