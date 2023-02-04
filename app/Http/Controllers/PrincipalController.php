<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function index()
    {

        $motivo_contatos = MotivoContato::all();


        $output = array(
            'titulo' => 'Super Gestão - Home',
            'motivo_contatos' => $motivo_contatos
        );


        return view('site.principal', $output);
    }
}
