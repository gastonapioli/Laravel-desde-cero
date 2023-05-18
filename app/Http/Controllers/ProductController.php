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

        $product = Product::create(request()->all());
        return $product;
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
        $product = Product::findOrFail($product);
        $product->update(request()->all());
        return $product;
    }
    public function destroy($product)
    {
        $product = Product::findOrFail($product);
        $product->delete();
        return $product;
    }
}
