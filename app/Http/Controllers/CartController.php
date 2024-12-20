<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Exibir o carrinho de compras
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    // Adicionar um produto ao carrinho
    public function add(Request $request)
    {
        $productId = $request->product_id;
        $product = Product::findOrFail($productId);
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'quantity' => 1,
                'price' => $product->regular_price,
                'image' => $product->image,
            ];
        }
        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('status', 'Produto adicionado ao carrinho!');
    }

    // Remover um produto do carrinho
    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$request->product_id])) {
            unset($cart[$request->product_id]);
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('status', 'Produto removido do carrinho!');
    }

    // Atualizar a quantidade de um produto no carrinho
    public function update(Request $request)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$request->product_id])) {
            $cart[$request->product_id]['quantity'] = $request->quantity;
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('status', 'Carrinho atualizado!');
    }

}
