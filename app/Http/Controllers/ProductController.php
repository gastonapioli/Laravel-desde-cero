<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $products = db::table('products')->get();
        // dd($products);

        $products = Product::all();
        return view('products.index')->with([
            'products' => $products,
        ]);
    }

    public function create()
    {
        return view('products.create');
    }
    public function store(ProductRequest $request)
    {
        /* $product=Product::create([
            'title'=> request()->title,
            'description'=>request()->description,
            'price'=>request()->price,
            'stock'=>request()->stock,
            'status'=>request()->status,
        ]); */

        /*  $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:0'],
            'status' => ['required', 'in:Disponible,NoDisponible'],
        ];
        request()->validate($rules);   //esto es para validar los datos */

        //el request hace referencia a la carga actual de producto



        $product = Product::create(request()->validate());
        // return redirect()->back();
        // return redirect()->action('ProductController@index');
        // session()->flash('success', "El producto {$product->id} {$product->title} fue creado");

        return redirect()->route('products.index')->withSuccess("El producto {$product->id} {$product->title} fue creado");
    }
    public function show(Product $product)
    {
        /* $product = db::table('products')->find($product);  //find en vez de get para traer un solo elemento
        dd($product); */

        // $product = Product::findOrFail($product);   //busca un producto especifico o lanza una excepción

        return view('products.show')->with([
            'product' => $product,
        ]);
    }
    public function edit(Product $product)
    {
        // $product = Product::findOrFail($product);
        return view('products.edit')->with([
            'product' => $product
        ]);
    }
    public function update(Product $product, ProductRequest $request)
    {
        /* $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:0'],
            'status' => ['required', 'in:Disponible,NoDisponible'],
        ];
        request()->validate($rules);   //esto es para validar los datos */

        // $product = Product::findOrFail($product);
        $product->update($request()->validate());
        return redirect()->route('products.index')->withSuccess("El producto {$product->id} {$product->title} fue editado");
    }
    public function destroy(Product $product)
    {
        // $product = Product::findOrFail($product);
        $product->delete();
        return redirect()->route('products.index')->withSuccess("El producto {$product->id} {$product->title} fue eliminado1");;
    }
}
