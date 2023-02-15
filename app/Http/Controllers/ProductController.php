<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index($categorySlug)
    {
        $products = Category::where('slug', $categorySlug)->first()->products;
        return view('products', compact('products'));
    }
    public function show($id)
    {
        $product = Product::find($id);
        return view('detail', compact('product'));
    }
}


