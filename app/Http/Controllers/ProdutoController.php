<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $request){
        $busca = $request->search;

        return view('products', ['busca' => $busca]);

    }
}
