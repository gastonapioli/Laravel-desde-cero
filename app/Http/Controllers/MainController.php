<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {

        $products = Product::aviable()->get();
        return view('welcome')->with([
            'products' => $products,
        ]);
    }
}