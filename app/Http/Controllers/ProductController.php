<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class ProductController extends Controller
{
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
    public function store()
    {
        /* $product=Product::create([
            'title'=> request()->title,
            'description'=>request()->description,
            'price'=>request()->price,
            'stock'=>request()->stock,
            'status'=>request()->status,
        ]); */

        $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:0'],
            'status' => ['required', 'in: Disponible, No Disponible'],
        ];
        request()->validate($rules);   //esto es para validar los datos

        //el request hace referencia a la carga actual de producto
        if (request()->status == 'Disponible' && request()->stock == 0) {
            session()->flash('error', 'Debe tener stock mayor a cero para estar disponible'); //flash deja siponible el error hasta la prox peticion
            return redirect()->back();
        }


        $product = Product::create(request()->all());
        // return redirect()->back();
        // return redirect()->action('ProductController@index');
        return redirect()->route('products.index');
    }
    public function show($product)
    {
        /* $product = db::table('products')->find($product);  //find en vez de get para traer un solo elemento
        dd($product); */

        $product = Product::findOrFail($product);   //busca un producto especifico o lanza una excepción

        return view('products.show')->with([
            'product' => $product,
        ]);
    }
    public function edit($product)
    {
        $product = Product::findOrFail($product);
        return view('products.edit')->with([
            'product' => $product
        ]);
    }
    public function update($product)
    {
        $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:0'],
            'status' => ['required', 'in: Disponible, No Disponible'],
        ];
        request()->validate($rules);   //esto es para validar los datos

        $product = Product::findOrFail($product);
        $product->update(request()->all());
        return redirect()->route('products.index');
    }
    public function destroy($product)
    {
        $product = Product::findOrFail($product);
        $product->delete();
        return redirect()->route('products.index');
    }
}
