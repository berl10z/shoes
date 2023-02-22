<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.admin', compact('products'));
    }
    public function create()
    {
        return view('admin.create');
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

        return to_route('admin');
    }
    public function destroy($id)
    {
        Product::destroy($id);

        return to_route('admin');
    }

}
