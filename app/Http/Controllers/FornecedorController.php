<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {

        $fornecedores = [
            0 => [
                'nome' => 'forn1',
                'status' => 'N',
                'cnpj' => '0',
                'ddd' => '',
                'telefone' => '0000-0000',
            ],
            1 => [
                'nome' => 'forn2',
                'status' => 'S',
                'cnpj' => null,
                'ddd' => '11',
                'telefone' => '0000-0000',

            ],
            2 => [
                'nome' => 'forn3',
                'status' => 'S',
                'cnpj' => null,
                'ddd' => '32',
                'telefone' => '0000-0000',

            ],
        ];

        // $fornecedores = array();


        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
