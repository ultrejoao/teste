<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use illuminate\Support\Str;
use illuminate\Support\Facades\File;
use Intervention\Image\Laravel\Facades\Image;
use App\Models\Product;

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

    public function products()
    {
        $products = Product::orderBy('id', 'DESC')->paginate(10);
        return view('admin.products', compact('products'));
    }

    // Método para mostrar o formulário de criação de produto
    public function create_product()
    {
        return view('admin.product-add');
    }

    // EXCLUI DA LISTA O PRODUTO
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.products')->with('success', 'ITEM DELETADO COM SUCESSO');
    }

    // EDITAR PRODUTO
    public function edit($id)
    {

        $product = Product::findOrFail($id);
        return view('admin.edit', compact('product'));
    }

    // UPDATE DO PRODUTO
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->regular_price = $request->input('regular_price');
        $product->quantity = $request->input('quantity');
        $product->save();

        return redirect()->route('admin.products')->with('success', 'ITEM ATUALIZADO COM SUCESSO');
    }

    // SALVANDO PRODUTO NO BD
    public function store_product(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:products,slug',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'quantity' => 'required|integer',
            'image' => 'nullable|mimes:jpg,jpeg,png|max:2048',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->slug = \Illuminate\Support\Str::slug($request->name);
        $product->description = $request->description;
        $product->regular_price = $request->regular_price;
        $product->sale_price = $request->sale_price;
        $product->quantity = $request->quantity;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $file_name);
            $product->image = $file_name;
        }

        $product->save();

        return redirect()->route('admin.products')->with('status', 'Product added successfully!');
    }


}
