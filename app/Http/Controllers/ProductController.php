<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = db::table('products')->get();
        dd($products);

        return view('products.index');
    }

    public function create()
    {
        return "Este es el form para crear un producto desde Controller";
    }
    public function store()
    {
        //
    }
    public function show($product)
    {
        $product = db::table('products')->find($product);  //find en vez de get para traer un solo elemento
        dd($product);
        return view('products.show');
    }
    public function edit($product)
    {
        return "Mostrando el form para editar el producto {$product} desde Controller";
    }
    public function update($product)
    {
        return "Mostrando el form para editar el producto {$product} desde Controller";
    }
    public function destroy()
    {
        //
    }
}