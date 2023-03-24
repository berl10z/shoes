<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $r,$categorySlug)
    {
        $categoryId = Category::where('slug',$categorySlug)->first()->id;
        $products = DB::table('products')->where('category_id',$categoryId)->paginate(3);
        return view('products', compact('products'));
    }
    public function show($id)
    {
        $product = Product::find($id);
        return view('detail', compact('product'));
    }
}


