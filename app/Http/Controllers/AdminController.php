<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use illuminate\Support\Str;
use illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;
use App\Models\Product;
use App\Models\Category;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    // CONTROLLER DOS PRODUTOS

    public function products()
    {
        $products = Product::orderBy('id', 'DESC')->paginate(10);
        return view('admin.products', compact('products'));
    }

    // Exibe o formulário de criação de produto
    public function create_product()
    {
        $categories = Category::all();
        return view('admin.product-add', compact('categories'));
    }

    // Exclui um produto
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.products')->with('success', 'ITEM DELETADO COM SUCESSO');
    }

    // Exibe o formulário de edição do produto
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.edit', compact('product', 'categories'));
    }

    // Atualiza o produto
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->regular_price = $request->input('regular_price');
        $product->quantity = $request->input('quantity');
        $product->category_id = $request->input('category_id');
        $product->save();

        return redirect()->route('admin.products')->with('success', 'ITEM ATUALIZADO COM SUCESSO');
    }

    // Armazena um novo produto
    public function store_product(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:products,slug',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'quantity' => 'required|integer',
            'image' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->slug = \Illuminate\Support\Str::slug($request->name);
        $product->description = $request->description;
        $product->regular_price = $request->regular_price;
        $product->sale_price = $request->sale_price;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $file_name);
            $product->image = $file_name;
        }

        $product->save();

        return redirect()->route('admin.products')->with('status', 'Produto adicionado com sucesso!');
    }
    public function showProductDetails($id)
    {
        $product = Product::findOrFail($id);
        return view('product.details', compact('product'));
    }

    // Exibe todas as categorias
    public function categories()
    {

        $categories = Category::paginate(10);
        return view('admin.categories.index', compact('categories'));
    }


    // Exibe o formulário de criação de categoria
    public function createCategory()
    {
        return view('admin.categories.create');
    }

    // Armazena a nova categoria
    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Category::create($request->all());

        return redirect()->route('admin.categories.index')->with('status', 'Categoria criada com sucesso!');
    }

    // Exibe o formulário de edição de categoria
    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    // Atualiza uma categoria
    public function updateCategory(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));
        $category->save();

        return redirect()->route('admin.categories.index')->with('status', 'Categoria atualizada com sucesso!');
    }


    // Exclui uma categoria
    public function destroyCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories.index')->with('status', 'Categoria excluída com sucesso!');
    }


}
