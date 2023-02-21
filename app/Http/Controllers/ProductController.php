<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::find($id);
        return view('detail', compact('product'));
    }
    public function showCatalog()
    {
        $products = Product::all();
        return view('catalog', compact('products'));
    }
}
