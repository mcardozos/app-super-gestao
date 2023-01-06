<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function index()
    {

       

        // if($_POST){
        //     print_r($_POST);
        //     exit;

        // }


        $output = array(
            'titulo' => 'Super Gestão - Contato'
        );

        return view('site.contato', $output);
    }
}
