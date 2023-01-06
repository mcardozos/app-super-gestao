<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SobreNosController extends Controller
{
    public function index()
    {

        $output = array(
            'titulo' => 'Super Gestão - Sobre nós'
        );

        return view('site.sobre', $output);
    }
}
