<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function index($p1, $p2){
        // echo "A soma de $p1 + $p2 é:" . ($p1 + $p2);

        $output = array(
            'p1' => $p1,
            'p2' => $p2,
        );

        // return view('site.teste', $output); // usanco com array
        
        // return view('site.teste', compact('p1','p2')); // usando com compact
        
        return view('site.teste')->with('p1', $p1)->with('p2', $p2); // usando com with


    }
}
