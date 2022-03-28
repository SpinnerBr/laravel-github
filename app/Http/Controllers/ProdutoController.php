<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(){
        $produtos=['Laranja','Tomate','Cenoura',"Pessego"];
        return $produtos;
    }
    public function show($idProduto){

        return "O ID do produto é: {$idProduto}";
    }
}
