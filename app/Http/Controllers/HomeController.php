<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(12);
        return view('home', compact('products'));
    }
}