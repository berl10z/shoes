<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('catalog', compact('products'));
    }

    public function create()
    {
        return view('create');
    }
    public function store(Request $r)
    {
        $r->validate([
            'name' => 'required|string',
            'description' => 'required',
            'price' => 'required',
        ]);

        $img = $r->file('image');

        $imgPath = $img->store('images',['disk' => 'public']);

        $product = Product::create([
            'name' => $r->input('name'),
            'description' => $r->input('description'),
            'image' => $imgPath,
            'price' => $r->input('price'),
        ]);

        return to_route('catalog');
    }
    public function destroy($id)
    {
        Product::destroy($id);

        return to_route('catalog');
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('detail', compact('product'));
    }
}


