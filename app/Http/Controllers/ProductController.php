<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
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
