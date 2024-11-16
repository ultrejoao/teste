<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function showPopularProducts()
    {
        $firstCategoryId = 8;
        $secondCategoryId = 9;
        $thirdCategoryId = 5;

        $firstCategoryProducts = Product::where('category_id', $firstCategoryId)
                                        ->take(10)
                                        ->get();

        $secondCategoryProducts = Product::where('category_id', $secondCategoryId)
                                         ->take(4)
                                         ->get();

        $thirdCategoryProducts = Product::where('category_id', $thirdCategoryId)
                                        ->take(6)
                                        ->get();

        return view('index', compact(
            'firstCategoryProducts',
            'secondCategoryProducts',
            'thirdCategoryProducts'
        ));
    }

    public function productDetails($id)
    {
        $product = Product::findOrFail($id);
        return view('product.details', compact('product'));
    }
    public function loadMore(Request $request)
    {
        $offset = $request->input('offset', 0);
        $limit = 4;
        $categoryId = $request->input('category_id');

        // Validação para garantir que o category_id é fornecido
        if (!$categoryId) {
            return response()->json(['error' => 'Category ID is required'], 400);
        }

        $products = Product::where('category_id', $categoryId)
            ->offset($offset)
            ->limit($limit)
            ->get();

        return response()->json([
            'html' => view('partials.product-cards', compact('products'))->render()
        ]);
    }
    public function index(Request $request)
    {
        $query = $request->input('query');

        $products = Product::when($query, function ($q) use ($query) {
            $q->where('name', 'like', "%{$query}%")
              ->orWhere('description', 'like', "%{$query}%");
        })
        ->paginate(10);

        return view('product.index', compact('products', 'query'));
    }
}


