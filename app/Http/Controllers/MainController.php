<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class MainController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function showLatestProducts()
    {
        $products = Product::latest()->take(5)->get();
        return view('index', compact('products'));
    }
}
