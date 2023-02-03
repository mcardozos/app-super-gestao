<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Carnes e Cia';
        $fornecedor->site = 'carnescia.com.br';
        $fornecedor->uf = 'RJ';
        $fornecedor->email = 'carnescia@teste.com.br';
        $fornecedor->save();

        Fornecedor::create([
            'nome' => 'Casa do Gelo',
            'site' => 'casadogelo.com.br',
            'uf' => 'RJ',
            'email' => 'casadogelo@uol.com.br',
        ]);
        Fornecedor::create([
            'nome' => 'Ambev',
            'site' => 'ambev.com.br',
            'uf' => 'SP',
            'email' => 'contato@ambev.com.br',
        ]);

    }
}
