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

    public function brands()
    {
        $brands = Brand::orderBy('id','DESC')->paginate(10);
        return view('admin.brands',compact('brands'));
    }

    public function add_brand()
    {
        return view('admin.brand-add');
    }

    public function brand_store(Request $request){
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:brands,slug',
            'image' => 'mimes:png,jpg,jpeg|max:2038'
        ]);

        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $image = $request->file('image');
        $file_extention = $request->file('image')->extension();
        $file_name = Carbon::now()->timestamp.'.'.$file_extention;
        $this->GenerateBrandThumbailsImage($image,$file_name);
        $brand->image = $file_name;
        $brand->save();
        return redirect()->route('admin.brands')->with('status','Brand has been added succesfully!');
    }

    public function brand_edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.brand-edit', compact('brand'));
    }

    public function brand_update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:brands,slug,' . $request->id, // Exclui a validação do próprio registro
            'image' => 'mimes:png,jpg,jpeg|max:2038'
        ]);

        $brand = Brand::find($request->id);
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        if($request->hasFile('image')){
            if(File::exists(public_path('uploads/brands').'/'.$brand->image))
            {
                File::delete(public_path('uploads/brands').'/'.$brand->image);
            }
            $image = $request->file('image');
            $file_extention = $request->file('image')->extension();
            $file_name = Carbon::now()->timestamp.'.'.$file_extention;
            $this->GenerateBrandThumbailsImage($image,$file_name);
            $brand->image = $file_name;
        }

        $brand->save();
        return redirect()->route('admin.brands')->with('status','Brand has been update succesfully!');
    }

    public function GenerateBrandThumbailsImage($image,$imageName)
    {
        $destinationPath = public_path('uploads/brands');
        $img = Image::read($image->path());
        $img->cover(124,124,"top");
        $img->resize(124,124,function($constraint){
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$imageName);
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
        $categories = Category::all();  // Pega todas as categorias
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
        $categories = Category::all();  // Pega todas as categorias
        return view('admin.edit', compact('product', 'categories'));
    }

    // Atualiza o produto
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Atualiza os dados do produto, incluindo a categoria
        $product->name = $request->input('name');
        $product->regular_price = $request->input('regular_price');
        $product->quantity = $request->input('quantity');
        $product->category_id = $request->input('category_id');  // Atualiza a categoria associada
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
            'category_id' => 'required|exists:categories,id',  // Validação para categoria
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->slug = \Illuminate\Support\Str::slug($request->name);
        $product->description = $request->description;
        $product->regular_price = $request->regular_price;
        $product->sale_price = $request->sale_price;
        $product->quantity = $request->quantity;
        $product->category_id = $request->category_id;  // Atribui a categoria ao produto

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $file_name);
            $product->image = $file_name;
        }

        $product->save();

        return redirect()->route('admin.products')->with('status', 'Produto adicionado com sucesso!');
    }

    // Exibe todas as categorias
    public function categories()
    {
        $categories = Category::all();  // Obtém todas as categorias
        return view('admin.categories.index', compact('categories'));
    }

    // Exibe o formulário de criação de categoria
    public function createCategory()
    {
        return view('admin.categories.create');  // Exibe o formulário de criação
    }

    // Armazena a nova categoria
    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Category::create($request->all());  // Cria a nova categoria

        return redirect()->route('admin.categories.index')->with('status', 'Categoria criada com sucesso!');
    }

    // Exibe o formulário de edição de categoria
    public function editCategory($id)
    {
        $category = Category::findOrFail($id);  // Encontra a categoria pelo ID
        return view('admin.categories.edit', compact('category'));  // Exibe o formulário de edição
    }

    // Atualiza uma categoria

    public function updateCategory(Request $request, $id)
    {
        // Validação para o campo nome e para o slug único
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
        ]);

        // Obtém a categoria pelo ID
        $category = Category::findOrFail($id);

        // Atualiza o nome e o slug baseado no novo nome
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name')); // Cria um novo slug

        $category->save();

        return redirect()->route('admin.categories.index')->with('status', 'Categoria atualizada com sucesso!');
    }


    // Exclui uma categoria
    public function destroyCategory($id)
    {
        $category = Category::findOrFail($id);  // Encontra a categoria pelo ID
        $category->delete();  // Exclui a categoria

        return redirect()->route('admin.categories.index')->with('status', 'Categoria excluída com sucesso!');
    }


}
