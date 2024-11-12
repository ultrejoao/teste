<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function showPopularProducts()
    {
        // IDs das categorias específicas
        $firstCategoryId = 5;  // Substitua pelo ID da primeira categoria
        $secondCategoryId = 9; // Substitua pelo ID da segunda categoria

        // Obtendo produtos da primeira categoria
        $firstCategoryProducts = Product::where('category_id', $firstCategoryId)
                                        ->take(10)
                                        ->get();

        // Obtendo produtos da segunda categoria
        $secondCategoryProducts = Product::where('category_id', $secondCategoryId)
                                         ->take(4)
                                         ->get();

        // Passando as coleções separadamente para a view
        return view('index', compact('firstCategoryProducts', 'secondCategoryProducts'));
    }

    public function productDetails($id)
    {
        $product = Product::findOrFail($id);
        return view('product.details', compact('product'));
    }
}


