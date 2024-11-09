<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Certifique-se de importar o modelo Product

class HomeController extends Controller
{
    // Método para exibir a lista de produtos
    public function index()
    {
        // Busca todos os produtos
        $products = Product::all();  // Ou use paginate() para paginação se necessário

        // Retorna a view com os produtos
        return view('index', compact('products'));
    }

    // Método para exibir os detalhes do produto
    public function productDetails($id)
    {
        // Encontre o produto pelo id
        $product = Product::findOrFail($id);

        // Retorne a view com os detalhes do produto
        return view('product.details', compact('product'));
    }
}
