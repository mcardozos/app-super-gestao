<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function index()
    {
        $output = array(
            'titulo' => 'Super Gestão - Home'
        );


        return view('site.principal', $output);
    }
}
