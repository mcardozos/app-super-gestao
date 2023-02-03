<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteContato;
use Carbon\Factory;
use Database\Factories\SiteContatoFactory;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $contato = new SiteContato();

        // $contato->nome = 'Marcelo Cardozo';
        // $contato->telefone = '24-999434083';
        // $contato->email = 'mcardozos@yahoo.com.br';
        // $contato->motivo_contato = '1';
        // $contato->mensagem = 'Seja bem vindo ao nosso sistema';
        // $contato->save();

        SiteContato::factory(100)->create();


    }
}
