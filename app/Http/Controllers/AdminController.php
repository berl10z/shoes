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

        $imgPath = $img->store('images', ['disk' => 'public']);

        $product = Product::create([
            'name' => $r->input('name'),
            'description' => $r->input('description'),
            'image' => $imgPath,
            'price' => $r->input('price'),
        ]);

        return to_route('admin')->with('success', 'Продукт успешно добавлен');;
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.edit',compact('product'));
    }
    public function update(Request $r, $id)
    {
        $r->validate([
            'name' => 'required|string',
            'description' => 'required',
            'price' => 'required',
        ]);

        $product = Product::findOrFail($id);

        $product->name = $r->input('name');
        $product->description = $r->input('description');
        $product->price = $r->input('price');

        if ($r->hasFile('image')) {
            $img = $r->file('image');
            $imgPath = $img->store('images', ['disk' => 'public']);
            $product->image = $imgPath;
        }

        $product->save();

        return to_route('admin')->with('success', 'Продукт успешно обновлен');
    }
    public function destroy($id)
    {
        Product::destroy($id);

        return to_route('admin');
    }
}
